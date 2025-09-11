pipeline {
    agent any

    environment {
        REGISTRY   = "docker.io/syifamaulidya"
        IMAGE_NAME = "sijago-app"
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }

        stage('Build Docker Image') {
            when { branch 'dev' }
            steps {
                script {
                    docker.build(
                        "${REGISTRY}/${IMAGE_NAME}:${BUILD_NUMBER}",
                        "-f Dockerfile.prod ."
                    )

                    env.IMAGE_TAG = "${REGISTRY}/${IMAGE_NAME}:${BUILD_NUMBER}"
                    env.IMAGE_LATEST = "${REGISTRY}/${IMAGE_NAME}:latest"

                    currentBuild.description = env.IMAGE_TAG
                }
            }
        }

        stage('Run Tests and Generate App Key Secret') {
            when { branch 'dev' }
            steps {
                script {
                    sh '''
                      # Generate app key sekali saja
                      if [ ! -f .appkey ]; then
                        php artisan key:generate --show > .appkey
                        docker secret create app_key .appkey || true
                      fi

                      # Jalankan test pakai image hasil build
                      docker run --rm \
                        -e APP_KEY=$(cat .appkey) \
                        $IMAGE_TAG \
                        php artisan test --env=testing --parallel || true
                    '''
                }
            }
        }

        stage('Push to DockerHub') {
            when { branch 'dev' }
            steps {
                withCredentials([usernamePassword(
                    credentialsId: 'dockerhub-creds',
                    usernameVariable: 'DOCKER_USER',
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    sh '''
                      echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
                      docker push $IMAGE_TAG
                      docker tag $IMAGE_TAG $IMAGE_LATEST
                      docker push $IMAGE_LATEST
                    '''
                }
            }
        }

        stage('Deploy to Staging') {
            when { branch 'dev' }
            steps {
                dir ("${WORKSPACE}") {
                    sh '''
                      docker stack deploy -c docker-compose.prod.yml sijago_stack_dev
                      docker stack services sijago_stack_dev
                    '''
                }
            }
        }
    }

    post {
        success {
            echo '✅ Pipeline sukses! Stack berhasil di-deploy ke Swarm.'
        }
        failure {
            echo '❌ Pipeline gagal! Cek stage yang error.'
        }
        always {
            echo 'ℹ️ Pipeline selesai dieksekusi.'
        }
    }
}

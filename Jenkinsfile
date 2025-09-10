pipeline {
    agent any

    environment {
        REGISTRY     = "docker.io/syifamaulidya"
        IMAGE_NAME   = "sijago-app"   // tag unik per build
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
            when { branch 'dev'}
            steps {
                script {
                    // build image memakai Docker pipeline DSL
                    def builtImage = docker.build("${REGISTRY}/${IMAGE_NAME}:${BUILLD_NUMBER}")

                    // simpan nama image ke environment variable
                    env.IMAGE_TAG = "${REGISTRY}/${IMAGE_NAME}:${BUILD_NUMBER}"

                    // tambahkan deskripsi build Jenkins UI
                    currentBuild.description = env.IMAGE_TAG
                }
            }
        }

        stage('Run Tests') {
            when { branch 'dev'}
            steps {
                script {
                sh '''
                  if [ ! -f .appkey ]; then
                    php artisan key:generate --show > .appkey
                  fi
                  APP_KEY=$(cat .appkey)
                  docker run --rm \
                    -e APP_KEY=$APP_KEY \
                    $DOCKER_IMAGE:$DOCKER_TAG php artisan test --env=testing || true
                '''
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
                    sh 'echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin'
                    sh 'docker push $DOCKER_IMAGE:$DOCKER_TAG'
                    sh 'docker push $DOCKER_IMAGE:latest'
                }
            }
        }

        stage('Deploy to Staging') {
            when { branch 'dev'}
            steps {
                echo "Deploying ${IMAGE_NAME} to Development environment (docker swarm) ..."
                dir ("${WORKSPACE}") {
                    sh '''
                      export APP_KEY=$(cat .appkey)
                      APP_KEY=$APP_KEY docker stack deploy -c docker-compose.prod.yml sijago_stack_dev
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

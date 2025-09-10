pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "syifamaulidya/docker-ci-cd-integration-deployment"
        DOCKER_TAG   = "${env.BUILD_NUMBER}"   // tag unik per build
        DOCKER_FILE  = "Dockerfile.prod"       // pakai Dockerfile.prod
        STACK_NAME   = "sijago"                // nama stack swarm
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
            steps {
                sh 'docker build -f $DOCKER_FILE -t $DOCKER_IMAGE:$DOCKER_TAG .'
                sh 'docker tag $DOCKER_IMAGE:$DOCKER_TAG $DOCKER_IMAGE:latest'
            }
        }

        stage('Run Tests') {
            steps {
                sh '''
                  docker run --rm \
                    -e APP_KEY=$(php artisan key:generate --show) \
                    $DOCKER_IMAGE:$DOCKER_TAG php artisan test --env=testing || true
                '''
            }
        }

        stage('Push to DockerHub') {
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

        stage('Deploy to Swarm') {
            steps {
                script {
                    // buat secret kalau belum ada
                    sh '''
                      echo "secret_password" | docker secret create db_password - 2>/dev/null || true
                    '''
                    // deploy stack
                    sh '''
                      docker stack deploy -c docker-compose.prod.yml $STACK_NAME
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

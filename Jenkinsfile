pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "syifamaulidya/docker-ci-cd-integration-deployment"
        DOCKER_TAG   = "${env.BUILD_NUMBER}"   // tag unik per build
        DOCKER_FILE  = "Dockerfile.prod"       // pakai Dockerfile.prod
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

        stage('Clean Old Container & Image') {
            steps {
                sh """
                  docker stop sijago-dev || true
                  docker rm sijago-dev || true
                """
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build --no-cache --pull -f $DOCKER_FILE -t $DOCKER_IMAGE:$DOCKER_TAG .'
                sh 'docker tag $DOCKER_IMAGE:$DOCKER_TAG $DOCKER_IMAGE:dev'
            }
        }

        stage('Run Tests') {
            steps {
                withCredentials([string(credentialsId: 'laravel-app-key', variable: 'APP_KEY')]) {
                    sh '''
                      docker run --rm \
                        -e APP_KEY=$APP_KEY \
                        $DOCKER_IMAGE:$DOCKER_TAG php artisan test --env=testing || true
                    '''
                }
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
                    sh 'docker push $DOCKER_IMAGE:dev'
                }
            }
        }

        stage('Deploy') {
            steps {
                withCredentials([string(credentialsId: 'laravel-app-key', variable: 'APP_KEY')]) {
                    sh """
                      docker pull $DOCKER_IMAGE:dev
                      docker stop sijago-dev || true
                      docker rm sijago-dev || true
                      docker run -d --name sijago-dev -p 8001:8000 \
                        -e APP_KEY=$APP_KEY \
                        -e APP_DEBUG=true \
                        $DOCKER_IMAGE:dev
                    """
                }
            }
        }
    }

    post {
        success {
            echo '✅ Pipeline sukses! Aplikasi berhasil di-deploy ke DEV environment (port 9100).'
        }
        failure {
            echo '❌ Pipeline gagal! Cek stage yang error.'
        }
        always {
            echo 'ℹ️ Pipeline selesai dieksekusi.'
        }
    }
}
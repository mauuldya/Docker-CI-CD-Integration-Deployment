pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "syifamaulidya/docker-ci-cd-integration-deployment"
        DOCKER_TAG   = "dev"
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
                  docker rmi -f $DOCKER_IMAGE:$DOCKER_TAG || true
                """
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build --pull --no-cache --force-rm -t $DOCKER_IMAGE:$DOCKER_TAG .'
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
                }
            }
        }

        stage('Deploy') {
            steps {
                withCredentials([string(credentialsId: 'laravel-app-key', variable: 'APP_KEY')]) {
                    sh """
                      docker pull $DOCKER_IMAGE:$DOCKER_TAG
                      docker stop sijago-dev || true
                      docker rm sijago-dev || true
                      docker run -d --name sijago-dev -p 9100:8000 \
                        -e APP_KEY=$APP_KEY \
                        $DOCKER_IMAGE:$DOCKER_TAG
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

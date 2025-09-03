pipeline {
    agent any

    environment {
        // Nama image yang akan dipush ke DockerHub (ganti dengan username repo kamu di DockerHub)
        DOCKER_IMAGE = "syifamaulidya/docker-ci-cd-integration-deployment"
        DOCKER_TAG   = "latest"
    }

    stages {
        stage('Checkout') {
            steps {
                echo "🔄 Checkout source code dari GitHub..."
                git branch: 'syifa',
                    url: 'https://github.com/mauuldya/Docker-CI-CD-Integration-Deployment.git',
                    credentialsId: 'jenkins-tokens-github'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo "🐳 Build Docker image..."
                sh 'docker build -t $DOCKER_IMAGE:$DOCKER_TAG .'
            }
        }

        stage('Run Tests') {
            steps {
                echo "🧪 Menjalankan tests..."
                // ganti dengan perintah test beneran kalau ada
                sh 'echo "Running tests (dummy step for now)"'
            }
        }

        stage('Push to DockerHub') {
            steps {
                echo "📤 Push image ke DockerHub..."
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
    }

    post {
        success {
            echo "✅ Pipeline sukses! Image sudah dipush ke DockerHub: $DOCKER_IMAGE:$DOCKER_TAG"
        }
        failure {
            echo "❌ Pipeline gagal. Cek log error di atas."
        }
    }
}

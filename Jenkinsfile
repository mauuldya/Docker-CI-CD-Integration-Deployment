pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "syifamaulidya/docker-ci-cd-integration-deployment"
        DOCKER_TAG   = "${BUILD_NUMBER}" // tag unik per build
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

        stage('Clean Old Image') {
            steps {
                echo "🧹 Hapus image lama jika ada..."
                sh 'docker rmi $DOCKER_IMAGE:$DOCKER_TAG || true'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo "🐳 Build Docker image..."
                sh 'docker build --no-cache -t $DOCKER_IMAGE:$DOCKER_TAG .'
            }
        }

        stage('Run Tests') {
            steps {
                echo "🧪 Menjalankan tests..."
                sh 'echo "Running tests (dummy step for now)"'
            }
        }

        stage('Push to DockerHub') {
            when {
                branch 'syifa'
            }
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

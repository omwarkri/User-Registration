pipeline {
  agent any 
 pipeline {
    agent any

    environment {
        IMAGE_NAME = "omwarkri123/php-app"
    }

    stages {

        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/your/repo.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t $IMAGE_NAME ."
            }
        }

        stage('Run Container') {
            steps {
                sh """
                docker stop php_app || true
                docker rm php_app || true
                docker run -d --name php_app -p 9000:80 $IMAGE_NAME
                """
            }
        }

        stage('Optional: Push to DockerHub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh """
                    echo \$DOCKER_PASS | docker login -u \$DOCKER_USER --password-stdin
                    docker tag $IMAGE_NAME $DOCKER_USER/php-app:latest
                    docker push $DOCKER_USER/php-app:latest
                    """
                }
            }
        }
    }
}

pipeline {
    agent any

    environment {
        IMAGE_NAME = "omwarkri123/php-app"
        CONTAINER_NAME = "php_app"
        HOST_PORT = "8081"  // changed to 8081
        CONTAINER_PORT = "80"
    }

    stages {

        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/omwarkri/User-Registration.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t $IMAGE_NAME ."
            }
        }

        stage('Push DockerHub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh """
                    echo \$DOCKER_PASS | docker login -u \$DOCKER_USER --password-stdin
                    docker tag $IMAGE_NAME \$DOCKER_USER/php-app:latest
                    docker push \$DOCKER_USER/php-app:latest
                    """
                }
            }
        }

        stage('Deploy') {
            steps {
                sh """
                # Stop old container if exists
                docker stop $CONTAINER_NAME || true
                docker rm $CONTAINER_NAME || true

                # Run new container on port 8081
                docker run -d --name $CONTAINER_NAME -p $HOST_PORT:$CONTAINER_PORT $IMAGE_NAME

                # Verify container is running
                docker ps | grep $CONTAINER_NAME
                """
            }
        }
    }
}

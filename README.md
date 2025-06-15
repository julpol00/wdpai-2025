![Logo](LAB01-KONFIGURACJA/public/img/logo.svg)

# Rodent Analysis

A web application for managing pets, their activities, notifications, and monitoring their weight. 

## Requirements

- [Docker](https://www.docker.com/get-started) and [Docker Compose](https://docs.docker.com/compose/install/) must be installed on your system.

## Installation

1. Clone the repository:
    ```sh
    git clone <repository-url>
    cd <repository-folder>
    ```

2. Build and start all services using Docker Compose:
    ```sh
    docker-compose up --build
    ```

3. The application and all required services (such as the database) will start automatically in Docker containers.

## Usage

- Once the containers are running, open your browser and go to [http://localhost:3000](http://localhost:3000)  
  *(Replace `3000` with your configured port if different)*

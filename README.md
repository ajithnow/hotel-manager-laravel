# Hotel Manager App

The Hotel Manager App is an open-source web application designed to assist hoteliers in their day-to-day tasks. It provides a comprehensive solution for managing reservations, guest information, room allocation, billing, and more.

## Features

- Reservation management: Create, update, and cancel reservations with ease.
- Guest check-in/check-out: Streamline the guest registration and departure process.
- Room allocation: Assign rooms to guests based on their preferences and availability.
- Billing: Generate invoices and manage billing information.
- Other Travel Agents (OTA) syncing.
- Reporting: Generate reports on occupancy, revenue, and other key metrics.
- User authentication and authorization: Secure access to the app's features based on user roles.

## Technology Stack

- Backend:
  - PHP: Programming language for the backend.
  - Laravel: Lightweight HTTP framework for routing and request handling.
  - Rest: API layer for efficient data querying and manipulation.
  - MySql: Relational SQL database for data storage.

- Frontend:
  - React: TypeScript-based web application framework for building the user interface.

## Prerequisites

- Docker: [Installation Guide](https://docs.docker.com/get-docker/)
- Docker Compose: [Installation Guide](https://docs.docker.com/compose/install/)

## Build and Run the Docker Containers

To build and run the Docker containers for the Hotel Manager App, follow the steps below:

1. Clone the repository:

`git clone https://github.com/your-username/hotel-manager-app.git`
`cd hotel-manager-app`


2. Build the Docker images:

`docker-compose build`

This command will build the Docker images for the backend and frontend services based on the configuration specified in the `docker-compose.yml` file.

3. Run the Docker containers:

`docker-compose up`

This command will start the Docker containers for the backend and frontend services. You should see the logs from each container displayed in the terminal.

4. Access the Hotel Manager App:

Once the containers are up and running, you can access the Hotel Manager App in your web browser at [http://localhost](http://localhost).

5. Stop the running containers:

To stop the Docker containers, press `Ctrl + C` in the terminal where the containers are running.

6. Restart the containers:

If you need to restart the containers at a later time, you can run the following command:

`docker-compose up`

## Contributing

Contributions to the Hotelier App are welcome! If you'd like to contribute, please follow these guidelines:

1. Fork the repository and create your branch:

`git checkout -b feature/your-feature-name`

2. Make your changes and commit them:

`git commit -m "Add your commit message"`

3. Push your branch to your forked repository:

`git push origin feature/your-feature-name`

4. Open a pull request in the main repository, describing your changes and the rationale behind them.

Please ensure that your contributions adhere to our [Code of Conduct](docs/readme/CODE_OF_CONDUCT.md) and [Contributing Guidelines](docs/readme/CONTRIBUTING.md). By participating in this project, you agree to abide by these terms.

Thank you for contributing to the Hotelier App!

## License

The Hotelier App is open-source and released under the [MIT License](LICENSE). Feel free to use, modify, and distribute the codebase as per the terms of the license.

Feel free to modify and customize this README file according to your specific project requirements.

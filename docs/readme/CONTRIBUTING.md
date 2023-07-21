# Contributing Guidelines

Thank you for considering contributing to the Hotelier App! We appreciate your efforts in making our project better.

To ensure a smooth and collaborative experience for everyone, please follow these guidelines when contributing to the project.

## Table of Contents

-   [Code of Conduct](#code-of-conduct)
-   [Ways to Contribute](#ways-to-contribute)
-   [Coding Guidelines](#coding-guidelines)
-   [Commit Message Guidelines](#commit-message-guidelines)
-   [Issue and Pull Request Guidelines](#issue-and-pull-request-guidelines)
-   [Recognition](#recognition)

## Code of Conduct

Please review and abide by our [Code of Conduct](CODE_OF_CONDUCT.md) during your participation in the project.

## Ways to Contribute

There are several ways you can contribute to the Hotelier App:

- **Reporting Issues**: If you encounter any bugs or issues, please report them on the [issue tracker](https://github.com/ajithnow/hotel-manager-laravel/issues).

- **Feature Requests**: If you have ideas for new features or enhancements, you can submit them as [feature requests](https://github.com/ajithnow/hotel-manager-laravel/issues).

-   **Bug Fixes and Improvements**: You can contribute to the project by fixing bugs, improving existing features, or optimizing performance. Please follow the guidelines mentioned below.

-   **Documentation**: Help improve the project's documentation by fixing typos, adding examples, or enhancing the existing documentation.

-   **Translations**: If the project supports multiple languages, you can contribute by translating the application or documentation into other languages.

## Coding Guidelines

Please adhere to the following coding guidelines when contributing to the project:

-   Follow the coding style and conventions used in the project.
-   Write clear, concise, and well-documented code.
-   Ensure your code is properly formatted and free of linting errors.

## Test before commmit
Please test before commits using unit tests. Make sure that you have proper `env.testing` file.
run the tests using
    `sail artisan test --env=testing`
## Commit Message Guidelines

When writing commit messages, please follow these guidelines:

-   Use clear and descriptive commit messages.
-   Start the message with a verb in the present tense (e.g., "Add," "Fix," "Update").
-   Provide additional details in the commit body if necessary.

## Issue and Pull Request Guidelines

-   Before submitting an issue, please check if a similar issue has already been reported.
-   When opening a pull request, please reference the related issue(s) if applicable.
-   Follow the feedback and instructions provided by the project maintainers during the review process.

## Recognition

Contributors who make significant contributions to the project will be recognized and acknowledged in the project's documentation.

Thank you for your interest in contributing to the Hotel Manager App. We appreciate your support and look forward to your contributions!

## Modular Folder Structure <a name="contributing-modular-folder-structure">#</a>

-   Modules
    -   Module
        -   Configs: This directory holds module-specific configuration files.
        -   Controllers: This directory contains the controllers responsible for handling HTTP requests within the User module.
        -   Factories: This directory can contain factory classes for generating test data specific to the User module.
        -   Migrations: This directory holds the database migration files specific to the User module.
        -   Models: This directory contains the model classes representing the data structures used within the User module.
        -   Repositories: This directory holds the repository classes responsible for data access within the User module.
        -   Routes: This directory can contain route definitions specific to the User module.
        -   Seeders: This directory can contain seeder classes for populating initial data specific to the User module.
        -   Services: This directory contains the service classes that handle the business logic and coordination within the User module.
        -   Support: This directory can be used to store any additional support files or utilities related to the User module.

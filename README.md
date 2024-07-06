# Cytology Laboratory Application

A web application to manage the traceability of cytological tests in a technical laboratory.

## Features

- Manage samples from collection to completion
- Track sample status through various stages:
    - SampleReception
    - SampleCut
    - Fixation
    - Inclusion
    - BlockCut
    - Staining
- Log and view status changes for each sample
- User-friendly CRUD interfaces for all models

## Installation

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js & npm
- MySQL or other database supported by Laravel

## Usage

### CRUD Operations

The application provides CRUD interfaces for each model involved in the cytology laboratory process. You can manage samples and their states through the web interface.

### Sample Workflow

1. **Obtención de la Muestra**: Create a sample with initial details.
2. **Recepción y Registro de la Muestra**: Record the reception details and update the sample status.
3. **Corte de la Muestra**: Manage the cutting details and update the sample status.
4. **Fijación**: Record fixation details and update the sample status.
5. **Inclusión**: Manage the inclusion details and update the sample status.
6. **Corte de los Bloques**: Record block cutting details and update the sample status.
7. **Tinción**: Manage staining details and update the sample status.

### Tracking Status Changes

Each sample's status is tracked and can be viewed in the sample detail page, showing the history of all status changes.

### Deploy
    ```
    php artisan migrate:refresh --seed
    php artisan make:crud statuses tailwind
    php artisan make:crud sample_types tailwind
    php artisan make:crud samples tailwind
    ```

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

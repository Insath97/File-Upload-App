![File Upload](https://github.com/user-attachments/assets/052a7a37-2657-422a-8a6f-6695b58600bb)

# 🚀 File Upload Application

This **File Upload Application** is built using **Laravel 11** and provides an intuitive interface for users to easily upload documents with validation checks for supported file types. Developed by **Mohamed Insath**, this application uses **Bootstrap** for sleek styling and **SweetAlert** for enhanced user notifications.

## 🛠 Installation

### Method 1: Using Git

1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/Insath97/File-Upload-App.git
    ```

2. Navigate to the project directory:
    ```bash
    cd File-Upload-App
    ```

3. Install the required dependencies using Composer:
    ```bash
    composer install
    ```

4. Set up your `.env` file and configure your database connection:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. Run the migrations if applicable:
    ```bash
    php artisan migrate
    ```

6. Start the local development server:
    ```bash
    php artisan serve
    ```

7. Open your web browser and go to `http://localhost:8000` to view the application.

### Method 2: Download and Manual Setup

1. Download the repository as a ZIP file and extract it to your local machine.

2. Navigate to the extracted folder in your terminal or command prompt.

3. Install the required dependencies using Composer:
    ```bash
    composer install
    ```

4. Set up your `.env` file and configure your database connection:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. Run the migrations if applicable:
    ```bash
    php artisan migrate
    ```

6. Start the local development server:
    ```bash
    php artisan serve
    ```

7. Open your web browser and go to `http://localhost:8000` to view the application.

## 🎉 Usage

- Once the application is running, you can upload documents by dragging and dropping files or clicking to browse.
- Ensure that the files meet the accepted formats: **PNG, JPG, PDF, or DOCX**.
- After successful uploads, you will receive confirmation notifications.

## 🤝 Contributing

If you'd like to contribute to this project, feel free to fork the repository and submit a pull request.

## 📄 License

This project is open-source and available under the MIT License.

## ✍️ Author

**Mohamed Insath**  
Email: [insath1997.mi@gmail.com](mailto:insath1997.mi@gmail.com)

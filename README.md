# 1. Laravel CURD Test Project

## 1.1. 專案介紹

這是一個使用 Laravel 框架開發的基本 CRUD 應用。這個專案用於展示如何在 Laravel 中實現創建、讀取、更新和刪除數據的基本功能。

## 1.2. 需求

### 1.2.1. Laravel Sail

Laravel Sail 是 Laravel 項目的輕量級命令行界面，用於與 Laravel 的 Docker 環境進行交互。為了使用 Laravel Sail，你需要在你的機器上安裝以下軟件：

- [Docker Desktop](https://www.docker.com/products/docker-desktop)

如果你在 Windows 上使用 Docker Desktop，你需要啟用 WSL 2 並確保 WSL 2 的 Linux 核心已安裝。更多詳細信息，請參考 Docker 的 [WSL 2 安裝指南](https://docs.docker.com/docker-for-windows/wsl/)。

在安裝 Docker Desktop 之後，你可以在終端中運行 `docker run hello-world` 命令來確認 Docker 是否已正確安裝。

### 1.2.2. Node.js 和 npm

Laravel Breeze 需要 Node.js 和 npm 來編譯前端資源。你需要在你的機器上安裝以下軟件：

- [Node.js](https://nodejs.org/en/download/)
- npm (通常會與 Node.js 一起安裝)

你可以在終端中運行以下命令來確認 Node.js 和 npm 是否已正確安裝：

```bash
node -v
npm -v
```

## 1.3. 部署過程

### 1.3.1. 使用 Laravel Sail 部署

1. 複製專案到本地：
   ```bash
   git clone https://github.com/zxc88645/laravel-curd-test.git
   cd laravel-curd-test
   ```
2. 安裝 Composer 依賴項：
    ```bash
    composer install
    ```
3. 安裝 Node.js 依賴項：
    ```bash
    npm install
    ```
4. 編譯前端資源：
    ```bash
    npm run dev
    ```
5. 複製 .env.example 文件並命名為 .env：
    ```bash
    cp .env.example .env
    ```
6. 生成應用密鑰：
    ```bash
    php artisan key:generate
    ```
7. 啟動 Laravel Sail：
    ```bash
    ./vendor/bin/sail up
    ```
8. 運行數據庫遷移：
    ```bash
    ./vendor/bin/sail artisan migrate
    ```
9. 運行測試：
    ```bash
    ./vendor/bin/sail artisan test
    ```
    - 這個命令將運行 Laravel 的 PHPUnit 測試。如果所有測試都通過，將在終端中看到一個綠色的 "OK"。如果有任何測試失敗，它們將被列出並標記為紅色。


現在，可以在瀏覽器中訪問 http://localhost 來查看 Laravel 應用程序。

## 1.4. 範例網站

可以訪問 [https://crud.owotool.com/](https://crud.owotool.com/) 來查看一個已經架設好的範例網站。

可以使用以下帳號登入範例網站：

- 郵件：test@test.com
- 密碼：88888888
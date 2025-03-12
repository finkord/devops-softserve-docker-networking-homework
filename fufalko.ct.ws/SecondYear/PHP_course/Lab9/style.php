<style>
    .image-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .image-container div {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-container a {
        background-color: transparent;
        color: transparent;
        text-decoration: none;
        padding: 0;
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;

        height: 200px;

        transition: box-shadow 0.3s ease, transform 0.2s ease;
    }

    .image-container a:hover {
        background-color: transparent;
        box-shadow: 0 0 10px 3px rgba(255, 255, 255, 0.7);

        transform: scale(1.05);
    }
</style>
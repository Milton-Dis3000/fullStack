<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="/dist/output.css" rel="stylesheet">
    <title>Login</title>

</head>

<body>

    <main class="bg-gray-100 flex items-center justify-center h-screen p-6">
        <section class="w-96 h-auto max-h-screen border-2 border-gray-300 rounded-2xl text-gray-700 p-6">
            <div class="w-32 h-4 mb-10 ">
                <img src="../src/img/devchallenges.svg" alt="logo" class="w-full h-full">
            </div>

            <div class="textSuperior pb-4">
                <h2 class="text-xl font-bold">Login</h2>
            </div>

            <div class="inputRegister">
                <form action="../handle_db/login_process.php" method="post" enctype="multipart/form-data">
                    <div class="input-container mb-6 relative">
                        <input type="email" id="correo" name="email" placeholder="Email" required class="w-full h-10 px-3 pl-10 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                        <i class="fas fa-envelope absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-600"></i>
                    </div>

                    <div class="input-container mb-6 relative">
                        <input type="password" id="contra" name="contra" placeholder="Password" required class="w-full h-10 px-3 pl-10 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                        <i class="fas fa-unlock absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-600"></i>
                    </div>

                    <input id="Search" type="submit" value="Login" class="w-full h-10 px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-700 cursor-pointer mb-6">

                    <div class="pb-6">
                        <p class="text-center text-gray-600 mb-4">or continue with these social profiles</p>
                        <div class="flex justify-center items-center gap-4 pb-6">
                            <i class="fa-brands fa-google rounded-full border border-gray-300 p-1"></i>
                            <i class="fa-brands fa-facebook rounded-full border border-gray-300 p-1"></i>
                            <i class="fa-brands fa-twitter rounded-full border border-gray-300 p-1"></i>
                            <i class="fa-brands fa-github rounded-full border border-gray-300 p-1"></i>
                        </div>

                        <div id="loginMember" class="flex justify-center items-center text-gray-600">
                            <p>Don’t have an account yet?</p>
                            <a href="../index.php" class="border-none bg-none text-blue-500 cursor-pointer ml-1">Support</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>

</html>
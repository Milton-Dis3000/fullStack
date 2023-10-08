<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/Js/main.js" defer></script>
    <link rel="stylesheet" href="/css/toggle.css">

</head>

<body>

    <!-- toglleBar -->
    <nav>
        <div id="isologotipo">
            <img src="/src/img/devchallenges.svg" alt="logo">
        </div>
        <ul>

            <div id="photoContainer1">
                <img src="/src/img/perfilvacio.png" alt="photo">

                <p>xxxxx</p>

                <div id="toggleIcons">
                    <!-- <i class="fa-solid fa-caret-up"></i> -->
                    <i class="fa-solid fa-sort-down"></i>
                </div>

            </div>

            <div id="toggleBar">

                <div id="infeText">

                    <div id="profile">
                        <i class="fa-solid fa-circle-user"></i>

                        <a href="profile.php">My profile</a>
                    </div>

                    <div id="chat">
                        <i class="fa-solid fa-user-group"></i>
                        <p>Group chat</p>

                    </div>

                    <hr>
                    <div id="logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>

                        <a href="../index.php">Logout</a>

                    </div>
                </div>

            </div>

        </ul>

    </nav>

    <main class="flex justify-center items-center">
        <section class="bg-white p-6 rounded-lg border border-gray-300 mx-auto" style="max-width: 500px; width: 100%;">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="flex items-center justify-between mb-4 border-b pb-4">
                    <div>
                        <h2 class="text-lg font-bold">Change Inf</h2>
                        <p class="text-gray-500 text-sm">Changes will be reflected to every services</p>
                    </div>

                </div>

                <div class="flex items-center space-y-4">
                    <img src="/src/img/perfilvacio.png" alt="photo" class="w-12 h-12 rounded-8px object-cover ml-2 mr-6">
                    <h2 class="text-lg font-bold ">CHANGE PHOTO</h2>
                </div>

                <div class="changeName mb-4">
                    <p>Name</p>
                    <input type="text" id="name" name="name" value="<?php isset($userData['name']) ? print($userData['name']) : print('') ?>" placeholder="Enter your name..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeBio mb-4">
                    <p>Bio</p>
                    <input type="text" id="bio" name="bio" value="<?php isset($userData['bio']) ? print($userData['bio']) : print('') ?>" placeholder="Enter your bio..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changePhone mb-4">
                    <p>Phone</p>
                    <input type="text" id="phone" name="phone" value="<?php isset($userData['phone']) ? print($userData['phone']) : print('') ?>" placeholder="Enter your phone..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeEmail mb-4">
                    <p>Email</p>
                    <input type="text" id="email" name="email" value="<?php isset($userData['email']) ? print($userData['email']) : print('') ?>" placeholder="Enter your Email..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changePhone mb-4">
                    <p>Password</p>
                    <input type="password" id="password" name="password" placeholder="Enter your password..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div id="saveButton">
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>


            </form>
        </section>
    </main>

</body>

</html>
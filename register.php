<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
    <script src="../js/tailwind.js"></script>
   <link rel="stylesheet" href="textAnm.css">
     <!-- ICON / LOGO -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>

    <style>
        #logImg {
            filter: drop-shadow(0px 4px 15px rgba(255, 255, 255, 0.093)); /* Ubah nilai sesuai preferensi Anda */
        }
        #txtS {
            filter: drop-shadow(0px 4px 15px rgba(14, 155, 221, 0.633)); /* Ubah nilai sesuai preferensi Anda */
        }
        .shadow1 {
            filter: drop-shadow(0px 4px 5px rgba(0, 0, 0, 0.441)); /* Ubah nilai sesuai preferensi Anda */
        }
        #btn {
            filter: drop-shadow(0px 4px 5px rgba(0, 0, 0, 0.348)); /* Ubah nilai sesuai preferensi Anda */
        }
        #btn:hover {
            filter: drop-shadow(0px 2px 10px rgba(104, 15, 206, 0.437)); /* Ubah nilai sesuai preferensi Anda */
        }
    </style>
</head>
<body class="bg-[#f2f2f2]">
        <div class="grid lg:grid-cols-10 lg:grid-rows-5 lg:h-screen bg">
            <!-- konten 2 -->
            <div class="font-[Poppins] max-lg:mt-4 lg:row-span-3 lg:row-start-2 lg:col-start-4 lg:col-span-4 lg:bg-[#FDFDFD] lg:shadow-xl lg:border-2 lg:rounded-2xl">

                <form method="POST" action="proses/userRegister.php" >
                    <h1 class="text-center text-3xl font-extrabold tracking-tight lg:mt-9">Register</h1>

                    <!-- text fields username -->
                    <div class="relative flex mt-4 border-b-2 border-gray-400 mx-16">
                        <div class="relative inset-y-0 flex items-center">
                            <i class="fa-solid fa-user text-gray-500"></i>
                        </div>
                        <input class=" focus:outline-none bg-transparent py-1 pl-2 w-full placeholder-gray-500" type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <!-- text fields password -->
                    <div class="relative flex mt-4 border-b-2 border-gray-400 mx-16">
                        <div class="relative inset-y-0 flex items-center">
                            <i class="fa-solid fa-key text-gray-500"></i>
                        </div>
                        <input class=" focus:outline-none bg-transparent py-1 pl-2 w-full placeholder-gray-500" type="password" name="password" id="password" placeholder="Password" required>
                    </div>

                    <!-- tombol login -->
                    <div class="relative flex mx-16 mt-4 shadow1">
                        <input class="duration-200 bg-yellow-400 border-[3px] border-transparent text-white py-1 text-center rounded-xl cursor-pointer hover:bg-transparent hover:border-yellow-700 hover:text-yellow-700 w-full" type="submit" value="Register">
                    </div>
                </form>
    <div class="mt-10">
            <div class="bg-[#001524] shadow1 p-6 lg:p-3 lg:mx-6 rounded-xl"> 
                <p class="font-[Poppins] text-center text-yellow-700">Sudah Punya Akun?</p>
                  <div class="flex justify-center mt-4 mb-2">
                      <a href="login.php" id="btn" class="duration-100 text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg hover:rounded-2xl text-md px-20 hover:px-24 pb-2.5 pt-2 lg:px-12 lg:hover:px-16 xl:px-20 xl:hover:px-24">Login</a>                               
                  </div>
                  <br>
                  <br>
                 <a class="mt-4 bg-yellow-500 text-white py-2 px-4 rounded hover-bg-red-700" href="index.php">Kembali</a>
             </div>     
        </div>
</body>
</html>

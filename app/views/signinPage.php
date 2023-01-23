<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/cureco/public/js/login.js"></script>
    <title>Sign In</title>
</head>
<body>
    <main class="flex items-center justify-center h-screen bg-orange-300">

        <form method="POST" action="/cureco/public/auth/signin" class="bg-white w-96 p-6 rounded shadow-sm">
            
                <div class="flex items-center justify-center mb-4">
                    <img src="templates/img/cruise.jpg" alt="logo" class="h-54 rounded" />
                </div>
                
                <?php if(!empty($data["em"])):?>
                    <div class="bg-red-500 px-3 py-2 rounded text-gray-100 mb-3">
                    <p><?=$data["em"]?></p>
                    </div>
                <?php endif?>

                <label id="email_err"
                class="text-orange-400 hidden" for="">Veuillez remplir ce champ !!</label>
                
                <input 
                id="email"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4"
                name="email" 
                type="text"
                placeholder="E-mail" 
                />


                <label id="pass_err"
                class="text-orange-400 hidden" for="">Veuillez remplir ce champ !!</label>


                <input 
                id="pass"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4" 
                name="password"
                type="password" 
                placeholder="Password"
                />


                <button 
                type="submit" 
                id="login"
                class="bg-orange-500 w-full text-gray-100 py-2 rounded mb-4 hover:bg-blue-700 transition-colors">
                Log In</button>

                <button 
                type="button"
                onClick="location.href='/cureco/public/page/signup'" 
                class="bg-orange-500 w-full text-gray-100 py-2 rounded hover:bg-blue-700 transition-colors">
                Sign Up</button>

            
        </form>

    </main>

<style>

.hidden {
  display: none;
}

.block {
  display: block;
}


</style>
    
</body>
</html>
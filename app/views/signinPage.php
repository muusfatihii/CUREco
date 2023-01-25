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

    <title>CURECO--Sign In</title>
</head>
<body>
    <main class="flex items-center justify-center h-screen bg-blue-300">

        <form method="POST" action="/projet/public/auth/signin" class="bg-white w-96 p-6 rounded shadow-sm">
                
                <?php if(!empty($data["em"])):?>
                    <div class="bg-red-500 px-3 py-2 rounded text-gray-100 mb-3">
                    <p><?=$data["em"]?></p>
                    </div>
                <?php endif?>

                <label id="email_err"
                class="text-red-400 hidden" for="">Inserez un email valide !!</label>
                
                <input 
                id="email"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4"
                name="email" 
                type="text"
                placeholder="E-mail" 
                />


                <label id="pass_err"
                class="text-red-400 hidden" for="">Inserez le password !!</label>


                <input 
                id="pass"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4" 
                name="password"
                type="password" 
                placeholder="Password"
                />


                <button 
                id="login"
                class="bg-blue-500 w-full text-gray-100 py-2 rounded mb-4 hover:bg-blue-700 transition-colors">
                Log In</button>

                <button 
                type="button"
                onClick="location.href='/projet/public'" 
                class="bg-blue-500 w-full text-gray-100 py-2 rounded hover:bg-blue-700 transition-colors">
                Back</button>

            
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
<div>
    <div class="flex items-center justify-center min-h-screen h-auto w-full bg-login bg-cover bg-no-repeat">
        <div class=" w-full">   
            <div class=" max-w-md mx-auto">
                <div class="bg-gray-50 py-8 px-4 shadow sm:rounded sm:px-10">
                    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-7 flex flex-col items-center">
                        <img class=" w-24 aspect-square" src="{{ asset('/img/admin-logo.png') }}" alt="">
                        <h2 class=" text-center text-2xl font-extrabold text-gray-900">Administrator Login</h2>
                    </div>
                    <form wire:submit="authenticate" class="space-y-6" action="#" method="POST">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                            <div class="mt-1">
                            <input wire:model="email" id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
            
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <div class="mt-1">
                            <input wire:model="password" id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
            
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                            </div>
                
                            <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot your password? </a>
                            </div>
                        </div>
            
                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

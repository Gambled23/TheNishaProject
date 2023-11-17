<div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>
    <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
            <a href="{{url('/redirect')}}" class="text-gray-400 hover:text-gray-600 font-medium">Administrador</a>
        </li>
        <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">{{"$pagina"}}</li>
    </ul>
    <ul class="ml-auto flex items-center">
    <li class="dropdown ml-3">
                    <button type="button" class="dropdown-toggle flex items-center">
                    <i class="ri-admin-line w-8 h-8 rounded block object-cover align-middle" style="color: #4338ca;"></i>
                    </button>
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </li>
    </ul>
</div>
    <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <svg width="100px" height="40px" width="40px" viewBox="0 0 2 24" fill="none" xmlns="http://www.w3.org/2000/svg" {{
            $attributes }}> <path d="M14 9V3L11 4H8L5 3V9L9.5 11L14 9ZM14 9L20 12L22 18L20 21H4L2 19L4 17L2 15L4 13M7
            21V9.88889M11 15V21L16.0435 16H18M8 7L8.00707 7.00707M11 7L11.0071 7.00707" stroke="#e7e7e7" stroke-width="2"
            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/> </svg>
            <span class="text-lg font-bold text-white ml-3">N I S H A</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group">
                <a href="{{url('/')}}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-home-2-line mr-3 text-lg text-gray-300"></i>
                    <span class="text-sm text-gray-300">Inicio</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg text-gray-300"></i>
                    <span class="text-sm text-gray-300">Crud</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{url('admin/producto')}}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Producto</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{url('admin/tag')}}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Tag</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{url('admin/variacion')}}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Variacion</a>
                    </li> 
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="{{url('admin/archive')}}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-folder-user-line mr-3 text-lg text-gray-300"></i>
                    <span class="text-sm text-gray-300">Archivo</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>

    <style>
        @media (max-width: 768px) {
            .sidebar-menu {
                width: 100%;
                height: auto;
                position: relative;
                transform: none;
            }
            .sidebar-overlay {
                display: none;
            }
        }
    </style>

<!-- filepath: resources/views/components/home-footer.blade.php -->
<footer class="bg-blue-500 dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 mt-16">
    <div class="max-w-7xl mx-auto px-4 py-12 flex flex-col md:flex-row justify-between items-center gap-8">
        <!-- Logo e nome -->
        <div class="flex flex-col items-center md:items-start gap-2">
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-16 w-auto fill-current text-gray-800 dark:text-gray-200 mb-2" />
            </a>
            <span class="text-white dark:text-gray-200 text-lg font-bold tracking-wide">Kimo Shop</span>
            <span class="text-xs text-gray-200 dark:text-gray-400 italic">Tecnologia para todos</span>
        </div>
        <!-- Missão, Visão, Valores -->
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-12 text-white dark:text-gray-200 text-center md:text-left">
            <div class="gap-4 flex flex-col">
                <div>
                    <h3 class="font-semibold text-base mb-2">Missão</h3>
                    <p class="text-sm">Oferecer um serviço que facilita o dia a dia dos nossos clientes.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-base mb-2">Visão</h3>
                    <p class="text-sm">Ser referência em e-commerce no Brasil.</p>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-base mb-2">Valores</h3>
                <ul class="text-sm list-disc list-inside">
                    <li>Inovação</li>
                    <li>Transparência</li>
                    <li>Respeito</li>
                    <li>Compromisso</li>
                </ul>
            </div>
        </div>
        <!-- Firulas extras -->
        <div class="flex flex-col items-center gap-2">
            <div class="flex gap-3">
                <a href="#" class="text-white dark:text-gray-400 hover:text-yellow-300 transition" title="Instagram">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 3.25a5.25 5.25 0 1 1 0 10.5 5.25 5.25 0 0 1 0-10.5zm0 1.5a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5zm5.25.75a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                </a>
                <a href="#" class="text-white dark:text-gray-400 hover:text-blue-400 transition" title="Facebook">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.522-4.478-10-10-10S2 6.478 2 12c0 5.019 3.676 9.163 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.261c-1.243 0-1.631.771-1.631 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.324 21.163 22 17.019 22 12z"/></svg>
                </a>
                <a href="#" class="text-white dark:text-gray-400 hover:text-green-400 transition" title="WhatsApp">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.12.56 4.13 1.62 5.92L0 24l6.18-1.62A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.19-3.48-8.52zM12 22c-1.85 0-3.63-.5-5.18-1.44l-.37-.22-3.67.96.98-3.57-.24-.38A9.94 9.94 0 0 1 2 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.03-7.47c-.27-.14-1.6-.79-1.85-.88-.25-.09-.43-.14-.61.14-.18.27-.7.88-.86 1.06-.16.18-.32.2-.59.07-.27-.14-1.13-.42-2.15-1.34-.79-.7-1.32-1.56-1.48-1.83-.16-.27-.02-.41.12-.55.13-.13.29-.34.43-.51.14-.18.18-.31.27-.52.09-.21.05-.39-.02-.53-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.61-.47-.16-.01-.35-.01-.54-.01-.19 0-.5.07-.76.34-.26.27-1 1-1 2.43s1.03 2.81 1.18 3c.15.19 2.03 3.1 4.94 4.22.69.3 1.23.48 1.65.62.69.22 1.32.19 1.82.12.56-.08 1.6-.65 1.83-1.28.23-.63.23-1.17.16-1.28-.07-.11-.25-.18-.52-.32z"/></svg>
                </a>
            </div>
            <span class="text-xs text-gray-200 dark:text-gray-400 mt-2">© {{ date('Y') }} Kimo Shop. Todos os direitos reservados.</span>
        </div>
    </div>
</footer>
<x-layout titleHeader="Register">
    <main class="bg-white overflow-clip shadow-xl rounded-4xl min-w-7/12 h-[500px] flex" data-aos="fade-up">
        <div class="relative w-1/2 flex flex-col h-full justify-center py-5 px-20">    
            <p data-aos="fade-right" data-aos-delay="300" class="absolute top-5 right-5 w-full flex justify-end gap-1 text-xs text-gray-400">Already have an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>
            <div data-aos="fade-up" data-aos-delay="400">
                <h2 class="font-bold text-4xl mb-2">Sign Up</h2>
                <p class="text-xs text-gray-400 mb-5">Organize Your Employees with EmpSecured</p>
            </div>
            <form data-aos="fade-up" data-aos-delay="500" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex border-b-1 border-gray-200 gap-3 items-center mb-4 focus-within:border-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="20px" fill="#6a7282 "><path d="M480-504.62q-49.5 0-84.75-35.25T360-624.62q0-49.5 35.25-84.75T480-744.62q49.5 0 84.75 35.25T600-624.62q0 49.5-35.25 84.75T480-504.62Zm-280 247.7v-24.31q0-24.77 14.42-46.35 14.43-21.57 38.81-33.5 56.62-27.15 113.31-40.73 56.69-13.57 113.46-13.57 56.77 0 113.46 13.57 56.69 13.58 113.31 40.73 24.38 11.93 38.81 33.5Q760-306 760-281.23v24.31q0 17.61-11.96 29.57-11.96 11.97-29.58 11.97H241.54q-17.62 0-29.58-11.97Q200-239.31 200-256.92Zm40 1.54h480v-25.85q0-13.31-8.58-25-8.57-11.69-23.73-19.77-49.38-23.92-101.83-36.65-52.45-12.73-105.86-12.73t-105.86 12.73Q321.69-349.92 272.31-326q-15.16 8.08-23.73 19.77-8.58 11.69-8.58 25v25.85Zm240-289.24q33 0 56.5-23.5t23.5-56.5q0-33-23.5-56.5t-56.5-23.5q-33 0-56.5 23.5t-23.5 56.5q0 33 23.5 56.5t56.5 23.5Zm0-80Zm0 369.24Z"/></svg>
                    <input autocomplete="off" class="input-no-autofill font-inter outline-none py-3 text-xs" type="text" name="name" placeholder="Name" required><br>
                </div>
                <div class="flex border-b-1 border-gray-200 gap-3 items-center mb-4 focus-within:border-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="20px" fill="#6a7282"><path d="M184.62-200q-27.62 0-46.12-18.5Q120-237 120-264.62v-430.76q0-27.62 18.5-46.12Q157-760 184.62-760h590.76q27.62 0 46.12 18.5Q840-723 840-695.38v430.76q0 27.62-18.5 46.12Q803-200 775.38-200H184.62ZM800-684.62 497.92-486.85q-4.23 2.23-8.57 3.73-4.35 1.5-9.35 1.5t-9.35-1.5q-4.34-1.5-8.57-3.73L160-684.62v420q0 10.77 6.92 17.7 6.93 6.92 17.7 6.92h590.76q10.77 0 17.7-6.92 6.92-6.93 6.92-17.7v-420ZM480-520l307.69-200H172.31L480-520ZM160-684.62v8.47-32.47 1.39V-720v12.77-2.04 33.12-8.47V-240v-444.62Z"/></svg>
                    <input autocomplete="off" class="input-no-autofill font-inter outline-none py-3 text-xs" type="email" name="email" placeholder="Email" required><br>
                </div>
                <div class="flex border-b-1 border-gray-200 gap-3 items-center mb-4 focus-within:border-primary transition" x-data="{ show: false }">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="20px" fill="#6a7282 "><path d="M280-430.77q-20.31 0-34.77-14.46-14.46-14.46-14.46-34.77 0-20.31 14.46-34.77 14.46-14.46 34.77-14.46 20.31 0 34.77 14.46 14.46 14.46 14.46 34.77 0 20.31-14.46 34.77-14.46 14.46-34.77 14.46ZM280-280q-83.33 0-141.67-58.28Q80-396.56 80-479.82q0-83.26 58.33-141.72Q196.67-680 280-680q61.62 0 111.12 33.38 49.5 33.39 72.26 86.62h355q6.13 0 11.88 2.23 5.74 2.23 10.97 7.46l47.69 47.69q5.23 5.24 7.35 10.8 2.11 5.56 2.11 11.92t-2.11 11.82q-2.12 5.46-7.35 10.7l-84.69 83.92q-3.99 4.3-9.57 6.88t-11.04 2.81q-5.47.23-10.93-1.38-5.46-1.62-10.69-5.08l-46.62-35.15-54.69 39.92q-4.23 3.23-8.69 4.46-4.46 1.23-9.69 1.23-5.23 0-9.81-1.61-4.58-1.62-8.81-4.08L571.92-400H463.38q-22.76 52.46-72.26 86.23T280-280Zm0-40q59.08 0 100.81-35.54 41.73-35.54 53.42-84.46h150.39l57.23 38.69q-.77 0-.39.12.39.11.39-.12l74.3-53.31L781-405.77v-.38.38L855.23-480h-.11.11l-40-40v-.12.12h-381q-11.69-48.92-53.42-84.46Q339.08-640 280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z"/></svg>
                    <input :type="show ? 'text' : 'password'" autocomplete="off" class="input-no-autofill font-inter outline-none py-3 text-xs flex-1" name="password" placeholder="Password" required>
                    <button type="button" @click="show = !show" tabindex="-1" class="focus:outline-none cursor-pointer">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6a7282" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6a7282" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 002.25 12s3.75 7.5 9.75 7.5c2.042 0 3.82-.393 5.282-1.02M6.228 6.228A10.45 10.45 0 0112 4.5c6 0 9.75 7.5 9.75 7.5a10.46 10.46 0 01-4.293 4.977M6.228 6.228L3 3m3.228 3.228l12.544 12.544" /></svg>
                    </button>
                </div>
                <div class="flex border-b-1 border-gray-200 gap-3 items-center mb-4 focus-within:border-primary transition" x-data="{ show: false }">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="20px" fill="#6a7282 "><path d="M280-430.77q-20.31 0-34.77-14.46-14.46-14.46-14.46-34.77 0-20.31 14.46-34.77 14.46-14.46 34.77-14.46 20.31 0 34.77 14.46 14.46 14.46 14.46 34.77 0 20.31-14.46 34.77-14.46 14.46-34.77 14.46ZM280-280q-83.33 0-141.67-58.28Q80-396.56 80-479.82q0-83.26 58.33-141.72Q196.67-680 280-680q61.62 0 111.12 33.38 49.5 33.39 72.26 86.62h355q6.13 0 11.88 2.23 5.74 2.23 10.97 7.46l47.69 47.69q5.23 5.24 7.35 10.8 2.11 5.56 2.11 11.92t-2.11 11.82q-2.12 5.46-7.35 10.7l-84.69 83.92q-3.99 4.3-9.57 6.88t-11.04 2.81q-5.47.23-10.93-1.38-5.46-1.62-10.69-5.08l-46.62-35.15-54.69 39.92q-4.23 3.23-8.69 4.46-4.46 1.23-9.69 1.23-5.23 0-9.81-1.61-4.58-1.62-8.81-4.08L571.92-400H463.38q-22.76 52.46-72.26 86.23T280-280Zm0-40q59.08 0 100.81-35.54 41.73-35.54 53.42-84.46h150.39l57.23 38.69q-.77 0-.39.12.39.11.39-.12l74.3-53.31L781-405.77v-.38.38L855.23-480h-.11.11l-40-40v-.12.12h-381q-11.69-48.92-53.42-84.46Q339.08-640 280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z"/></svg>
                    <input :type="show ? 'text' : 'password'" autocomplete="off" class="input-no-autofill font-inter outline-none py-3 text-xs flex-1" name="password_confirmation" placeholder="Confirm Password" required>
                    <button type="button" @click="show = !show" tabindex="-1" class="focus:outline-none cursor-pointer">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6a7282" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6a7282" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 002.25 12s3.75 7.5 9.75 7.5c2.042 0 3.82-.393 5.282-1.02M6.228 6.228A10.45 10.45 0 0112 4.5c6 0 9.75 7.5 9.75 7.5a10.46 10.46 0 01-4.293 4.977M6.228 6.228L3 3m3.228 3.228l12.544 12.544" /></svg>
                    </button>
                </div>
                <button data-aos="zoom-in" data-aos-delay="600" class="text-xs font-medium cursor-pointer mt-5 py-3 rounded-full w-full bg-primary text-white hover:bg-primary-hover hover:shadow hover:scale-105 transition" type="submit">Register</button>
            </form>
        </div>
        <div class="bg-primary w-1/2 h-full relative flex items-center justify-center">
            <div data-aos="fade-right" data-aos-delay="300" class="flex gap-3 items-center absolute top-5 right-5">
                <div class="w-5 h-5 rounded-full bg-white"></div>
                <h2 class="font-bold text-white text-2xl">EmpSecured</h2>
            </div>
            <img data-aos="zoom-in" data-aos-delay="400" class="w-90" src="{{ asset('resources/svg/business-tasklist-1.svg') }}" alt="">
        </div>
    </main>
    @if($errors->any())
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show" 
            x-transition:enter="transform transition ease-out duration-300"
            x-transition:enter-start="translate-y-10 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="opacity-0"
            class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 bg-red-100 text-red-700 px-4 py-2 rounded shadow text-xs"
            style="cursor:pointer"
        >
            {{ $errors->first() }}
        </div>
    @endif
</x-layout>
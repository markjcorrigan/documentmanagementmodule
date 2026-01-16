<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <!-- Header Section with About Me Button -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white flex-1">
                    Contact me
                </h2>
                <a href="/cv/index.html#section-1"
                   class="py-2 px-4 text-sm font-medium text-center text-white rounded-lg bg-indigo-800 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-primary-300 transition-colors duration-200 whitespace-nowrap"
                   title="Click here for more information about me">
                    About Me
                </a>
            </div>

            <br>

            <!-- SUCCESS/ERROR MESSAGES -->
            <div>
                @if ($showSuccess)
                    <div class="bg-green-200 text-green-600 p-4 mb-6 rounded-lg">
                        ✅ {{ $successMessage }}
                    </div>
                @endif

                @if ($showError)
                    <div class="bg-red-200 text-red-600 p-4 mb-6 rounded-lg">
                        ❌ {{ $errorMessage }}
                    </div>
                @endif
            </div>

            <form wire:submit.prevent="send" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Your email
                    </label>
                    <input type="email" name="email" wire:model="email" id="email"
                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                           placeholder="example@gmail.com" required>
                    @error('email')
                    <div class="bg-red-200 text-red-600 p-2 mt-1 rounded">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Your Full Name
                    </label>
                    <input type="text" id="name" name="name" wire:model="name"
                           class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                           placeholder="Let me know your name" required>
                    @error('name')
                    <div class="bg-red-200 text-red-600 p-2 mt-1 rounded">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Subject
                    </label>
                    <input type="text" id="subject" name="subject" wire:model="subject"
                           class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                           placeholder="Let me know how I can help you" required>
                    @error('subject')
                    <div class="bg-red-200 text-red-600 p-2 mt-1 rounded">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        Your message
                    </label>
                    <textarea id="message" name="message" wire:model="message" rows="6"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Leave a comment..."></textarea>
                    @error('message')
                    <div class="bg-red-200 text-red-600 p-2 mt-1 rounded">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Loading spinner -->
                <div wire:loading wire:target="send" class="flex items-center gap-2">
                    <img width="30" src="{{ asset('/storage/images/loading.gif') }}" alt="Loading...">
                    <span>Sending your message...</span>
                </div>

                <button
                    type="submit"
                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg sm:w-fit hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 bg-indigo-800 transition-colors duration-200"
                    wire:loading.attr="disabled"
                    wire:target="send"
                >
                    <span wire:loading.remove wire:target="send">Send Message</span>
                    <span wire:loading wire:target="send">Sending...</span>
                </button>
            </form>
        </div>
    </section>
</div>

{{-- resources/views/livewire/acid-database.blade.php --}}
<div>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Does your data have ACIDity?
        </h1>

        <hr class="border-gray-300 dark:border-gray-600 mb-6">

        <div class="space-y-6">
            {{-- Introduction --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    ACID (Atomicity, Consistency, Isolation, and Durability) is an acronym for the four primary attributes ensured to any transaction by a <a href="https://searchcio.techtarget.com/definition/transaction" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">transaction</a> manager (also called a transaction monitor). These attributes are:
                </p>
            </div>

            {{-- Atomicity --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    Atomicity
                </h3>
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    In a transaction involving two or more pieces of information, either all pieces are committed or none are.
                </p>
            </div>

            {{-- Consistency --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    Consistency
                </h3>
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    A transaction either creates a new and valid state of data or, if any failure occurs, returns all data to its state before the transaction started.
                </p>
            </div>

            {{-- Isolation --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    Isolation
                </h3>
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    A transaction in process and not yet committed must remain isolated from any other transaction.
                </p>
            </div>

            {{-- Durability --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    Durability
                </h3>
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    Committed data is saved by the system so that, even in the event of a failure and system restart, the data is available in its correct state.
                </p>
            </div>

            {{-- Additional Information --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    The ACID concept is described in ISO/IEC 10026-1:1992 Section 4. Each of these attributes can be measured against a <a href="https://searchcio.techtarget.com/definition/benchmark" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">benchmark</a>. In general, a transaction manager or monitor is designed to realize the ACID concept.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    In a <a href="https://whatis.techtarget.com/definition/distributed" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">distributed</a> system, one way to achieve ACID is to use a two-phase commit (2PC), which ensures that all involved sites must commit to transaction completion or none do, and the transaction is rolled back (see <a href="https://searchsqlserver.techtarget.com/definition/rollback" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">rollback</a>).
                </p>
            </div>

            {{-- Optional: Visual Representation --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 text-center">
                    ACID Properties Summary
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-blue-800 dark:text-blue-300 mb-2">Atomicity</h4>
                        <p class="text-blue-700 dark:text-blue-400">All or nothing transactions</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-green-800 dark:text-green-300 mb-2">Consistency</h4>
                        <p class="text-green-700 dark:text-green-400">Valid state before and after</p>
                    </div>
                    <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-purple-800 dark:text-purple-300 mb-2">Isolation</h4>
                        <p class="text-purple-700 dark:text-purple-400">Transactions don't interfere</p>
                    </div>
                    <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-orange-800 dark:text-orange-300 mb-2">Durability</h4>
                        <p class="text-orange-700 dark:text-orange-400">Committed changes persist</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle any interactive elements if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Add any additional JavaScript functionality here if needed
            console.log('ACID Database page loaded');
        });
    </script>
</div>
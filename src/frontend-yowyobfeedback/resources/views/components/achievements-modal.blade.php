<div x-show="showAchiement" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div @click.away="showAchiement = false"
            class="inline-block align-bottom dark:bg-gray-800 bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 dark:bg-gray-800">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">
                            @if (isset($id)) Modifier @else Ajouter @endif une réalisation
                        </h2>
                        <form action="@if (isset($id)) {{ route('achievements.update', ['id' => $id]) }}@else{{ route('achievements.create') }} @endif" method="post" enctype="multipart/form-data">
                            @if (isset($id))
                                @method('put')
                                <?php $m = Http::get('http://localhost:8080/api/achievement/' . $id)->object(); ?>
                            @endif
                            @csrf

                            <div class="w-full mx-2">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Titre</label>

                                <input
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    type="text" name="title" required value="@if (isset($id)) {{ $m->title }} @endif">
                            </div>

                            <div class="w-full mx-2 mt-4 md:mt-2">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Link</label>

                                <input
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    type="text" name="link" required value="@if (isset($id)) {{ $m->link }} @endif">
                            </div>


                            <div class="w-full mx-2 mt-4 md:mt-2">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Image</label>

                                <input
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    type="file" name="image">
                            </div>

                            <div class="w-full mx-2 mt-4 md:mt-2">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Description</label>

                                <textarea required name="description"
                                    class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">@if (isset($id)) {{ $m->description }} @endif</textarea>
                            </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse dark:bg-gray-800">
                <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                    @if (isset($id))
                        Modifier
                    @else
                        Enregistrer
                    @endif
                </button>
                <button @click=" showAchiement = false " type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Annuler
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

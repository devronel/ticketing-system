<div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('lib/summernote-0.9.0-dist/summernote-lite.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
        <script src="{{ asset('lib/summernote-0.9.0-dist/summernote-lite.js') }}"></script>
    @endpush
    <div class="mb-4">
       <h2 class=" text-3xl font-bold">Submit Ticket</h2>
   </div>
   <div>
       <div>
          <x-forms.input-field wire:model="subject" type="text" name="subject" id="subject" label="Subject" placeholder="Enter the name of your concern..." required />
       </div>
       <div class="mt-4">
          <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
          <select wire:model="department" id="department" name="department" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
             <option>--Select Options--</option>
             @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{$department->name}}</option>
             @endforeach
          </select>
          </div>
       <div class="mt-4">
          <x-forms.summernote-editor wire:model="description" id="dscription" label="Description" required />
       </div>
       <div class=" mt-4 flex items-center justify-end">
          <button wire:click="save" type="button" class="w-auto flex items-center gap-1 px-3 py-2 border border-transparent text-sm font-medium rounded text-white bg-yellow-600 shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
             </svg>             
             Update Ticket
           </button>
       </div>
    </div>
 </div>
 
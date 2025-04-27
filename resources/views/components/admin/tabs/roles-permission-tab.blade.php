<div wire:ignore class="mb-5">
    <div class="sm:hidden">
      <label for="tabs" class="sr-only">Select a tab</label>
      <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
      <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
        <option>My Account</option>
  
        <option>Company</option>
  
        <option selected>Team Members</option>
  
        <option>Billing</option>
      </select>
    </div>
    <div class="hidden sm:block">
      <nav class="flex space-x-4" aria-label="Tabs">
        <a href="{{ route('user-management.role.index') }}" class="{{ request()->routeIs('user-management.role.index') ? 'bg-gray-300 text-gray-700' : 'text-gray-500' }} px-3 py-2 font-medium text-sm rounded-md hover:text-gray-700" aria-current="page">Roles</a>
        <a href="{{ route('user-management.permission.index') }}" class="{{ request()->routeIs('user-management.permission.index') ? 'bg-gray-300 text-gray-700' : 'text-gray-500' }} hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Permissions</a>
      </nav>
    </div>
  </div>
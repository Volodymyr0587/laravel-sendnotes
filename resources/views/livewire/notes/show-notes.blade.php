<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function with()
    {
        return [
            'notes' => Auth::user()
                ->notes()
                ->orderBy('send_date', 'asc')
                ->get(),
        ];
    }
}; ?>

<div>
    <div class="space-y-2">
        <div class="grid grid-cols-1 gap-4 mt-12 sm:grid-cols-2">
            @foreach ($notes as $note)
            <x-card wire:key='{{ $note->id }}'>
                <div class="flex justify-between">
                    <a href="#"
                        class="text-xl font-bold transition duration-300 ease-in-out hover:underline hover:text-blue-500">{{
                        $note->title }}</a>
                    <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($note->send_date)->format('M-d-Y') }}
                    </div>
                </div>
                <div class="flex items-end justify-between mt-4 space-x-1">
                    <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                    <div>
                        <x-button.circle icon="eye"></x-button.circle>
                        <x-button.circle icon="trash"></x-button.circle>
                    </div>
                </div>
            </x-card>
            @endforeach
        </div>
    </div>
</div>

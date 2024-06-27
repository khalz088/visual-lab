@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display: none;">
    <div class="fixed inset-0 bg-black opacity-50"></div> <!-- Black overlay -->
    <div class="bg-white p-4 min-w-80 rounded shadow-md z-10 relative"> <!-- Modal content container -->
        <div class="items-center flex justify-center">
            <svg fill="#0f9518" viewBox="0 0 32 32" width="30" height="30" xmlns="http://www.w3.org/2000/svg" stroke="#0f9518">
                <path d="M0 26.016v-20q0-2.496 1.76-4.256t4.256-1.76h20q2.464 0 4.224 1.76t1.76 4.256v20q0 2.496-1.76 4.224t-4.224 1.76h-20q-2.496 0-4.256-1.76t-1.76-4.224zM4 26.016q0 0.832 0.576 1.408t1.44 0.576h20q0.8 0 1.408-0.576t0.576-1.408v-20q0-0.832-0.576-1.408t-1.408-0.608h-20q-0.832 0-1.44 0.608t-0.576 1.408v20zM7.584 16q0-0.832 0.608-1.408t1.408-0.576 1.408 0.576l2.848 2.816 7.072-7.040q0.576-0.608 1.408-0.608t1.408 0.608 0.608 1.408-0.608 1.408l-8.48 8.48q-0.576 0.608-1.408 0.608t-1.408-0.608l-4.256-4.256q-0.608-0.576-0.608-1.408z"></path>
            </svg>
        </div>
        <div class="items-center mt-4 flex justify-center">
            {{ $slot->isEmpty() ? 'Saved.' : $slot }}
        </div>
    </div>
</div>

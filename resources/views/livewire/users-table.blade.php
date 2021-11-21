<div class="container mx-auto p-10">
    <table wire:loading.delay.class="opacity-50" class="table-auto ">
        <thead>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Sing Up Dates</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr @if($loop->last) id="last_recrod" @endif</tr>
                <td class="border px-4 px-2">{{$user->name}}</td>
                <td class="border px-4 px-2">{{$user->email}}</td>
                <td class="border px-4 px-2">{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



    <script>
        const lastRecord = document.getElementById('last_records');
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if(entry.isIntersecting) {
                    @this.loadMore()
                }
            })
        })

        observer.observe(lastRecord)
    </script>
</div>

<x-layout>
    <header class="mt-5">
        <a href="/home"><img class="mx-auto" src="../img/letterly..svg" alt="Letterly logo"></a>
    </header>
    
    <div class="max-w-xl mx-auto my-12 pt-3">
        <div class="flex gap-3 items-baseline">
            <a href="/home" class="text-gray w-[36ch] text-sm hover:underline"><- Return to previous screen</a>
            <span class="block mx-auto w-full h-[2px] border-b border-dashed border-detail mb-12"></span>
        </div>
        <form id="text_form" class="w-full" action="/writings" method="POST">
            @csrf
            <div>
                <div class="flex items-center gap-3">
                    <span class="block w-0.5 h-12 rounded-[4px] bg-primary"></span>
                    <div>
                        <h3 class="text-2xl text-black">Title</h3>
                        <p class="text-sm text-gray mt-1 italic">Enter a meaningful title for your writing.</p>
                    </div>
                </div>
                <input type="text" placeholder="Title example" id="title" class="w-full mt-3 px-4 py-2 rounded-[4px] border border-detail text-black" name="title" required title="Enter a meaningful title for your writing">
            </div>
            <div class="mt-8">
                <div class="flex items-center gap-3">
                    <span class="block w-0.5 h-12 rounded-[4px] bg-primary"></span>
                    <div>
                        <h3 class="text-2xl text-black">Subtitle</h3>
                        <p class="text-sm text-gray mt-1 italic">Provide a subtitle that complements the title.</p>
                    </div>
                </div>
                <input type="text" placeholder="Subtitle example" id="subtitle" class="w-full mt-3 px-4 py-2 rounded-[4px] border border-detail text-black" name="subtitle" required title="Provide a subtitle that complements the title">
            </div>
            <div class="mt-8">
                <div class="flex items-center gap-3">
                    <span class="block w-0.5 h-12 rounded-[4px] bg-primary"></span>
                    <div>
                        <h3 class="text-2xl text-black">Content</h3>
                        <p class="text-sm text-gray mt-1 italic mb-3">Write your content here using the text editor.</p>
                    </div>    
                </div>
                <div id="editor"  style="height: 70vh;" title="Write your content here using the text editor"></div>
                <input type="hidden" id="content" name="content" required>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="bg-primary hover:bg-[#750000] text-sm font-semibold px-7 py-2 rounded-[4px] text-white mt-8 block mx-auto min-w-40">Publish</button>
        </form>
    </div>

    <x-layout_components.footer></x-layout_components.footer>
    
    <style>
        .ql-editor {
            font-family: 'Lora', sans-serif;
            font-size: 0.875rem;
        }
    </style>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    @vite('resources/js/scripts/editor/content.js');

</x-layout>
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" id="success-banner">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $slot }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.293 5.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 11-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 11-1.414-1.414L8.586 10 4.293 5.293a1 1 0 111.414-1.414L10 8.586l4.293-4.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
    </span>
</div>

<style>
    /* Add a CSS animation for fading out */
    @keyframes fadeOut {
        0% { opacity: 1; }
        100% { opacity: 0; }
    }

    /* Apply the animation to the success banner */
    #success-banner {
        animation: fadeOut 5s ease-in-out; /* Adjust the duration as needed (e.g., 5s) */
    }
</style>
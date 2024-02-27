<form wire:submit="save">
    <div class="grid grid-cols-1">
        <div class=" my-3">
            <label class="form-label font-medium">Write your Feedback
                <span class="text-red-600">😁</span></label>
            <div class="relative mt-2 input">
                <textarea wire:model="uraian"
                    class="w-full py-2 px-3 h-20 outline-none bg-white rounded-lg text-gray-900 focus:shadow-none" placeholder="Teks Anda"
                    name="teks" required></textarea>
                <div>
                    @error('uraian')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" id="submitsubscribe" name="send"
            class="py-2 px-5 inline-block font-medium hover:opacity-90 hover:shadow-lg hover:text-whitetracking-wide border align-middle transition duration-300 ease-in-out text-base text-center bg-[#116e63] text-white rounded-2xl">
            Kirim
        </button>
    </div>
</form>
    
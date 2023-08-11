<h3>

    Checking For Payment </h3>

    {{-- <h3>{{$y}}</h3> --}}

    <form name="sentMessage" action="{{ route('savequerydata') }}" method="POST">
        @csrf
        <div class="control-group">
            <input type="text" class="form-control" name="ResultCode"  value="{{$ResultCode}}" placeholder="Your Name">
            <input type="text" class="form-control" name="ResultDesc" value="{{$ResultDesc}}" placeholder="Your Name">
            <input type="text" class="form-control" name="trans_id" value="{{$trans_id}}" placeholder="Your Name">






        </div>


        <div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                Message</button>
        </div>
    </form>

        <form action="{{ route('buyer_review.store', ['order' => $order->id]) }}" method="post" class="mx-auto mb-5">
            @csrf
            <h2 class="mt-3 mb-30">Review the Buyer</h2>

            <div class="form-group mb-30">
                <label for="quality">Quality (out of 5)</label>
                <input required type="number"
                       class="form-control{{ $errors->has('quality') ? ' is-invalid' : '' }}"
                       value="{{ $order->buyerAccountReview->first()->quality }}" min="1" max="5" step="1"
                       id="quality" name="quality">
                @if ($errors->has('quality'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('quality') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group mb-30">
                <label for="comment">Comment</label>
                <textarea required type="text"
                          class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                          id="comment" name="comment" placeholder="{{ old('comment') }}"
                          maxlength="500" minlength="1" rows="6">
                    {{ $order->buyerAccountReview->first()->comment }}
                </textarea>
                @if ($errors->has('comment'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                @endif
            </div>
            <button type="submit" class="btn my_account_btn dashboard-btn">Submit</button>
        </form>
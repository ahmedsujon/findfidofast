<div>
    <section id="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="page-header-text">
                        <h4>Payment Method</h4>
                        <p>Choose your best payment method</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="step-content">
        <div class="container">
            <form action="{{ url('payment') }}"  method="post" class="form-step">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="step-page payment-page">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="selected-plan">
                                        <h4>Selected Plan : <span class="gold">GOLD</span>
                                            <span class="plan-price">${{ session('plan_price') }}</span>
                                        </h4>
                                    </div>
                                    <p>Think to Upgrade Plan? <a href="#">Click Here to Roll
                                            Back</a></p>
                                    <div class="multiple-photo">
                                        <div class="form-check">
                                            <input class="form-check-input" wire:model.blur='multiple_image'
                                                type="checkbox" value id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Add multiple photo <span class="extra">($29
                                                    extra)
                                            </label>
                                        </div>
                                    </div>
                                    <img class="img-fluid card-info"
                                        src="{{ asset('assets/app/images/card-information.jpg') }}"
                                        alt="Card Information" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">
                                        <div class="mb-4" style="display: none;">
                                            <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                            <input type="text" wire:model.blur='amount'
                                                class="form-control card-number" />
                                        </div>

                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label">Card
                                                Number</label>
                                            <input type="text" wire:model.blur='cc_number'
                                                class="form-control card-number" id="sddsd"
                                                placeholder="1234    4567    8919    1234" />
                                        </div>

                                        <div class="mb-4" style="text-align: left;">
                                            <label for="exampleFormControlInput1" class="form-label">Card
                                                Holder Name</label>
                                            <input type="text" wire:model.blur='card_holder_name'
                                                class="form-control" id="sddsd" placeholder='Card holder name' />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-12">
                                    <div class="form-left-right">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="exampleFormControlInput1" class="form-label">Expiration
                                                        Month
                                                        (MM)</label>
                                                    <input type="number" wire:model.blur="expiry_month"
                                                        class="form-control" id="expiry_month" placeholder="MM">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="exampleFormControlInput1" class="form-label">Expiration
                                                        Year
                                                        (YYYY)</label>
                                                    <input type="number" wire:model.blur="expiry_month"
                                                        class="form-control" id="expiry_month" placeholder="YYYY">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label">CVV</label>
                                            <input type="text" wire:model.blur='cvv' class="form-control card-cww"
                                                id="ereterer" placeholder="CVV">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="payment-option">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Package Plan - Gold</td>
                                                    <td style="text-align: center;"> - </td>
                                                    <td style="text-align: right;">${{ session('plan_price') }}.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left;">For Adding Multiple Photos</td>
                                                    <td style="text-align: center;"> - </td>
                                                    <td style="text-align: right;">$29.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td style="text-align: right;"><span class="subtotal">Subtotal:
                                                            $178.00</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="make-payment">
                                        <button type="submit" class="btn btn-payment" type="button">Make
                                            Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

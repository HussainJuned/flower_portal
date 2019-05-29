@extends('layouts.master')
@section('title', 'Preferred Communication')

@section('content')

    <div class="container" id="vue-pc">
        <main>
            <form action="{{ route('settings.preferred_communication.store') }}" method="get" class="mx-auto mb-5"
                  id="my-form" enctype="multipart/form-data">
                @csrf
                <section class="container new_search_page pc_tab" id="app_pc">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"></div>
                        <div class="col-md-9 col-sm-12">
                            <div class="my-5">
                                <h3>Preferred Communication</h3>
                                <p>set here your preferred communication</p>
                            </div>
                            <div class="table-responsive w-100 my-5">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Type</th>
                                        <th>Active</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>General</td>
                                        <td>Mail</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="general"
                                                       id="general_check" @if ($pc->general === 1)
                                                       checked="checked"
                                                    @endif
                                                >
                                                <label class="custom-control-label" for="general_check"></label>
                                            </div>
                                        </td>
                                        <td class="t_email"><input type="email" class="form-control"
                                                                   name="email_general"
                                                                   value="{{ $pc->email_general }}"
                                                                   @if ($pc->general !== 1)
                                                                       disabled="disabled"
                                                                   @endif
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>Order Confirmation</td>
                                        <td>Mail</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       name="order_confirmation" id="order_confirmation_check"
                                                       @if ($pc->order_confirmation === 1)
                                                       checked="checked"
                                                    @endif>
                                                <label class="custom-control-label"
                                                       for="order_confirmation_check"></label>

                                            </div>
                                        </td>
                                        <td class="t_email">
                                            <input type="email" class="form-control"
                                                   name="email_order_confirmation"
                                                   @if ($pc->order_confirmation !== 1)
                                                   disabled="disabled"
                                                   @endif
                                                   value="{{ $pc->email_order_confirmation }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipment</td>
                                        <td>Mail</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="shipment"
                                                       id="shipment_check" @if ($pc->shipment === 1)
                                                       checked="checked"
                                                    @endif>
                                                <label class="custom-control-label" for="shipment_check"></label>
                                            </div>
                                        </td>
                                        <td class="t_email"><input type="email" class="form-control"
                                                                   name="email_shipment"
                                                                   @if ($pc->shipment !== 1)
                                                                   disabled="disabled"
                                                                   @endif
                                                                   value="{{ $pc->email_shipment }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Invoices</td>
                                        <td>Mail</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="invoices"
                                                       id="invoices_check" @if ($pc->invoices === 1)
                                                       checked="checked"
                                                    @endif>
                                                <label class="custom-control-label" for="invoices_check"></label>
                                            </div>
                                        </td>
                                        <td class="t_email"><input type="email" class="form-control"
                                                                   name="email_invoices"
                                                                   @if ($pc->invoices !== 1)
                                                                   disabled="disabled"
                                                                   @endif
                                                                   value="{{ $pc->email_invoices }}"></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="my-5 text-center">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </main>
    </div>




@endsection



@push('css')
    <style type="text/css">
        table.table thead td,
        table.table tbody td {
            vertical-align: middle;
        }
    </style>
@endpush

@push('footer-js')
    <script type="text/javascript">
        $(function () {
            $('input[type=checkbox]').on('change', function (event) {
                if ($(this).is(':checked')) {
                    $(this).closest('td').siblings().find('input[type=email]').prop('disabled', false);
                } else {
                    $(this).closest('td').siblings().find('input[type=email]').prop('disabled', true);
                }

            });
        });
    </script>
@endpush


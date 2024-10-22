<x-layouts.main h1="Подтверждение email" title="Подтверждение email">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>
                            {{ trans('auth.register.success') }}
                        </p>
                        <p>
                            {{ trans('auth.verification.instruction') }}
                        </p>
                        <p>
                            {{ trans('auth.verification.email_sent', ['email' => $user->email]) }}
                        </p>

                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                {{ trans('auth.verification.resend') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>

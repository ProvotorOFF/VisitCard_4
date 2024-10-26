<x-layouts.main h1="" title="Email подтверждён">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        {{ trans('auth.verification.success') }}
                    </h5>
                    <p>
                        {{ trans('auth.verification.thanks') }}
                    </p>
                    <a href="{{ route('index') }}" class="btn btn-primary">
                        {{ trans('auth.verification.go_to_dashboard') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>

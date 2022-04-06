<div>
    @if ($status == 'instruction')
    <div class="row d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Introduction</div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione nobis quas necessitatibus,
                        nostrum doloribus alias. Molestiae porro dolores inventore.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ratione nobis quas necessitatibus,
                        nostrum doloribus alias. Molestiae porro dolores inventore.</p>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger" wire:click="changeStatus('start')">Start</button>
                </div>
            </div>
        </div>
    </div>
    @elseif ($status == 'start')
    <div class="row d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Soal {{ $priority }}/{{ $total_quiz }}</div>
                <div class="card-body">
                    <p>{{ $question->body }}</p>
                    <ul class="list-group list-group-flush">
                        @foreach (json_decode($question->answer) as $index => $answer)
                        <li class="list-group-item" wire:click="choiceOption({{ $index }})" role="button">
                            @if ($mySelected === $index)
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            @else
                            <i class="bi bi-circle me-2"></i>
                            @endif
                            {{ $answer }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    @if ($mySelected !== NULL)
                    <div>
                        <button class="btn btn-primary" wire:click="nextQuestion">Next</button>
                    </div>
                    @else
                    <button class="btn btn-secondary" disabled>Next</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @elseif ($status == 'finish')
    <div class="row d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Finish</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Jawaban Benar</span>
                            <span>{{ $correct }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Score</span>
                            <span>{{ round(($correct*100) / $total_quiz) }}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('quiz') }}" class="btn btn-warning">Ulang Ujian</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <h1>Error</h1>
    @endif
</div>

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                {{ $event->title }}
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-md-4 invoice-col">
                          <p class="mb-0">{{ $event->text }}</p>
                          <p>Дата: {{ $event->created_at->format('H:m d.m.y') }}</p>
                        </div>
                    </div>
                    <div>
                      <h5>Participants:</h5>
                      <div class="table-responsive">
                        <ul class="ml-2 fa-ul ">
                          @foreach ($event->participant()->get() as $participant)
                              <li>{{ $participant->name }} {{ $participant->surname }}</li>
                          @endforeach
                      </ul>
                      </div>
                      {{-- @dd($event->creator()->first()) --}}
                      {{-- @dd($event->participant()->where('id', auth()->user()->id)->exists()) --}}
                      @if(!$event->participant()->where('id', auth()->user()->id)->exists())
                      <x-adminlte-button 
                        label="Участвовать" 
                        theme="primary" 
                        wire:click='participate'/>
                      @else
                        <x-adminlte-button 
                        label="Отказаться от участия" 
                        theme="danger"/>
                      @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

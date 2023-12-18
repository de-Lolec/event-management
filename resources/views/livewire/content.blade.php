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
                          <p>Date: {{ $event->created_at->format('H:m d.m.y') }}</p>
                        </div>
                    </div>
                    <div>
                      <h5>Participants:</h5>
                      <div class="table-responsive">
                        <ul class="ml-2 fa-ul ">
                          @foreach ($event->participant()->get() as $participant)
                              <li>
                                <a href="#" 
                                data-toggle="modal" 
                                data-target="#modalPurple" >
                                {{ $participant->name }}
                                {{ $participant->surname }}
                                </a>
                              </li>
                              <x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple" size='lg'>
                                <ul class="ml-2 fa-ul ">
                                    <li>
                                        Login: {{ $participant->login }}
                                    </li>
                                    <li>
                                        Name: {{ $participant->name }}
                                    </li>
                                    <li>
                                        Surname: {{ $participant->surname }}
                                    </li>
                                    <li>
                                        Date Birth: {{ $participant->date_birth }}
                                    </li>
                                    <li>
                                        Registered: {{ $participant->created_at }}
                                    </li>
                                </ul>
                              </x-adminlte-modal>
                          @endforeach
                      </ul>
                      </div>
                      @if(!$event->participant()->where('user_id', auth()->user()->id)->exists())
                      <x-adminlte-button 
                        label="Participate" 
                        theme="primary" 
                        wire:click='participate'
                        />
                      @else
                        <x-adminlte-button 
                        label="Refuse to participate" 
                        theme="danger"
                        wire:click='cancelParticipate'
                        />
                      @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

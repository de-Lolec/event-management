<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                {{ $event->title }}
                                <small class="float-right">Date: 2/10/2014</small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <p>{{ $event->text }}</p>
                        </div>
                    </div>
                    <div>
                      <h5>Participants:</h5>
                      <div class="table-responsive">
                        <ul class="ml-2 fa-ul ">
                          @foreach ($event->participants()->get() as $participant)
                              <li>{{ $participant->name }} {{ $participant->surname }}</li>
                          @endforeach
                      </ul>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

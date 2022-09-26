       <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th rowspan="2" style="vertical-align: middle" >Tujuan </th>
                        <th rowspan="2" style="vertical-align: middle" > Indikator </th>
                        <th rowspan="2" style="vertical-align: middle" > Program </th>
                        <th rowspan="2" style="vertical-align: middle" > Kegiatan</th>
                        <th rowspan="2" style="vertical-align: middle" >Rincian Output</th>
                        <th rowspan="2" style="vertical-align: middle"> Tahun </th>
                        <th rowspan="2" style="vertical-align: middle">Satuan</th>                        
                        <th rowspan="2" style="vertical-align: middle">Target Tahun ({{ $tahunSinggle->name }})</th>
                        <th colspan="2">Realisasi Target Tahun ({{ $tahunSinggle->name }})</th>
                        <th rowspan="2" style="vertical-align: middle">Alokasi Anggaran Tahun ({{ $tahunSinggle->name }}) </th>
                        <th colspan="2">Realisasi Anggaran Tahun ({{ $tahunSinggle->name }})</th>
                        <th rowspan="2" style="vertical-align: middle"> Lokasi Aktual Pelaksanaan Kegiatan</th>
                        <th rowspan="2" style="vertical-align: middle"> Instansi Pelaksanaan</th>
                        @if (Auth::user()->role_id != 1 AND Auth::user()->role_id != 7) 
                        <th rowspan="2" style="vertical-align: middle">Aksi</th>                  
                        @endif
                      </tr>
                      <tr class="text-center">
                        <th>Sem 1</th>
                        <th>Sem 2</th>
                        <th>Sem 1</th>
                        <th>Sem 2</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                       @foreach ($program_pemerintah_pusats as $pusat)
                         @if ($pusat->user->id == Auth::user()->id && $pusat->tahun_id ==  $tahunSinggle->id ) 
                         {{-- && $pusat->tahun_id ==  $tahunSinggle->id --}}
                        <tr>                       
                          <td style="vertical-align: middle">{{ $pusat->indikator->target->tujuan->kode_tujuan }}.{{ $pusat->indikator->target->tujuan->name }}</td>
                          <td style="vertical-align: middle">{{ $pusat->indikator->kode_indikator }}{{ $pusat->indikator->deskripsi }}</td>
                          <td style="vertical-align: middle">{{ $pusat->kegiatan->program->kode_program }}.{{ $pusat->kegiatan->program->name_program }}</td>
                          <td style="vertical-align: middle">{{ $pusat->kegiatan->id }}.{{ $pusat->kegiatan->name_kegiatan }}</td>
                          <td style="vertical-align: middle">{{ $pusat->kode_rincianoutput }}.{{ $pusat->name_rincianoutput }}</td>
                          <td style="vertical-align: middle">{{ $pusat->tahun->name }}</td>
                          <td style="vertical-align: middle">{{ $pusat->satuan }}</td>
                          <td style="vertical-align: middle">{{ $pusat->target_tahun }}</td>
                          <td style="vertical-align: middle">{{ $pusat->realisasi_target_sem_1 }}</td>
                          <td style="vertical-align: middle">{{ $pusat->realisasi_target_sem_2 }}</td>
                          <td style="vertical-align: middle">{{ $pusat->alokasi_anggaran }}</td>
                          <td style="vertical-align: middle">{{ $pusat->realisasi_anggaran_sem_1 }}</td>
                          <td style="vertical-align: middle">{{ $pusat->realisasi_anggaran_sem_2 }}</td>
                          <td style="vertical-align: middle">{{ $pusat->lokasi_pelaksanaan_kegiatan }}</td>
                          <td style="vertical-align: middle">{{ $pusat->user->name }}</td>
                          <td align="center" style="width: 8rem">
                            <a href="/menu/pusat/{{ $pusat->id }}/edit" class="btn btn-warning " ><i class="fas fa-fw fa-pen-square"></i></a>
                           <form action="/menu/pusat/{{ $pusat->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin menghapus  : {{ $pusat->name_rincianoutput }} ?')">
                            <i class="fas fa-fw fa-trash"></i>
                            </button>
                            </form>
                          </td>
                        </tr>
                           @elseif(Auth::user()->role_id == 1 && $pusat->tahun_id ==  $tahunSinggle->id)
                             <tr>                       
                               <td style="vertical-align: middle">{{ $pusat->indikator->target->tujuan->kode_tujuan }}.{{ $pusat->indikator->target->tujuan->name }}</td>
                               <td style="vertical-align: middle">{{ $pusat->indikator->kode_indikator }}. {{ $pusat->indikator->deskripsi }}</td>
                               <td style="vertical-align: middle">{{ $pusat->kegiatan->program->kode_program }}.{{ $pusat->kegiatan->program->name_program }}</td>
                               {{-- <td>{{ $pusat->kegiatan->kode_kegiatan }}</td> --}}
                               <td style="vertical-align: middle">{{ $pusat->kegiatan->id }}.{{ $pusat->kegiatan->name_kegiatan }}</td>
                               <td style="vertical-align: middle">{{ $pusat->kode_rincianoutput }}. {{ $pusat->name_rincianoutput }}</td>
                               <td style="vertical-align: middle">{{ $pusat->tahun->name }}</td>
                               <td style="vertical-align: middle">{{ $pusat->satuan }}</td>
                               <td style="vertical-align: middle">{{ $pusat->target_tahun }}</td>
                               <td style="vertical-align: middle">{{ $pusat->realisasi_target_sem_1 }}</td>
                               <td style="vertical-align: middle">{{ $pusat->realisasi_target_sem_2 }}</td>
                               <td style="vertical-align: middle">{{ $pusat->alokasi_anggaran }}</td>
                               <td style="vertical-align: middle">{{ $pusat->realisasi_anggaran_sem_1 }}</td>
                               <td style="vertical-align: middle">{{ $pusat->realisasi_anggaran_sem_2 }}</td>
                               <td style="vertical-align: middle">{{ $pusat->lokasi_pelaksanaan_kegiatan }}</td>
                               <td style="vertical-align: middle">{{ $pusat->user->name }}</td>
                            </tr>
                            @elseif(Auth::user()->role_id == 7 && $pusat->tahun_id ==  $tahunSinggle->id)
                            @if ($pusat->indikator->target->tujuan->user_id == Auth::user()->id)
                                
                            <tr>                       
                              <td style="vertical-align: middle">{{ $pusat->indikator->target->tujuan->kode_tujuan }}.{{ $pusat->indikator->target->tujuan->name }}</td>
                              <td style="vertical-align: middle">{{ $pusat->indikator->kode_indikator }}. {{ $pusat->indikator->deskripsi }}</td>
                              <td style="vertical-align: middle">{{ $pusat->kegiatan->program->kode_program }}.{{ $pusat->kegiatan->program->name_program }}</td>
                              {{-- <td>{{ $pusat->kegiatan->kode_kegiatan }}</td> --}}
                              <td style="vertical-align: middle">{{ $pusat->kegiatan->id }}.{{ $pusat->kegiatan->name_kegiatan }}</td>
                              <td style="vertical-align: middle">{{ $pusat->kode_rincianoutput }}. {{ $pusat->name_rincianoutput }}</td>
                              <td style="vertical-align: middle">{{ $pusat->tahun->name }}</td>
                              <td style="vertical-align: middle">{{ $pusat->satuan }}</td>
                              <td style="vertical-align: middle">{{ $pusat->target_tahun }}</td>
                              <td style="vertical-align: middle">{{ $pusat->realisasi_target_sem_1 }}</td>
                              <td style="vertical-align: middle">{{ $pusat->realisasi_target_sem_2 }}</td>
                              <td style="vertical-align: middle">{{ $pusat->alokasi_anggaran }}</td>
                              <td style="vertical-align: middle">{{ $pusat->realisasi_anggaran_sem_1 }}</td>
                              <td style="vertical-align: middle">{{ $pusat->realisasi_anggaran_sem_2 }}</td>
                              <td style="vertical-align: middle">{{ $pusat->lokasi_pelaksanaan_kegiatan }}</td>
                              <td style="vertical-align: middle">{{ $pusat->user->name }}</td>
                            </tr>
                            @endif
                            @endif
                            @endforeach
                    </tbody>
                  </table>
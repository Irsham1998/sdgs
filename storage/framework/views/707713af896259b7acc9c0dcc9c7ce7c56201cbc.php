
<?php $__env->startSection('container'); ?>

 <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center">Formulir Realisasi Program, Kegiatan dan Anggaran Program Pemerintah Pusat</h1>
           
            <!-- DataTales Example -->
             <div class="card shadow mb-4">
             <div class="card-header py-3">

                  <select class="float-right btn btn-success dropdown-toggle" name="tahun_id" onchange="location = this.value;">
                    <option value="">-- Pilih Tahun --</option>
                    <?php $__currentLoopData = $tahuns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="/menu/pusat/<?php echo e($tahun->id); ?>"><?php echo e($tahun->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>  
                  <a class="mr-3 float-right btn btn-warning"><?php echo e($tahunSinggle->name); ?></a>

                  <a href="/form2a-export/<?php echo e($tahunSinggle->id); ?>" class="btn btn-success"><i class=" fas fa-fw fa-file-excel" ></i><span>Excel</span></a>
                  <?php if(Auth::user()->role_id == 3): ?> 
                  <a href="/menu/pusat/create" class="btn btn-info"><i class="fas fa-fw fa-plus-square"></i><span>Tambah Data</span></a>
                  <?php endif; ?>
                </div>
              <div class="card-body">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="table-responsive">
                   <?php echo $__env->make('Menu.ProgramPemerintahPusat.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
              </div>
            </div>
          </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Menu.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project-sdgs\resources\views/Menu/ProgramPemerintahPusat/index.blade.php ENDPATH**/ ?>
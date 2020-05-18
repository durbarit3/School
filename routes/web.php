<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Admin route start from here
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthController@login')->name('admin.login.submit');
    Route::get('/register', 'AuthController@showRegistationPage');
    Route::post('/register', 'AuthController@register')->name('admin.register');

});

// Menu area start

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/menu', 'AdminController@menuSetting')->name('admin.menu.setting');
    Route::get('/url/setting', 'AdminController@urlSetting')->name('admin.url.setting');
    Route::get('/get/url/name/{id}', 'AdminController@getUrlName');
});


Route::group(['prefix' => 'admin/categories', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::post('store', 'CategoryController@store')->name('admin.category.store');
    Route::patch('update', 'CategoryController@update')->name('admin.category.update');
    Route::get('status/change/{categoryId}', 'CategoryController@changeStatus')->name('admin.category.status.update');
    Route::get('hard/delete/{categoryId}', 'CategoryController@hardDelete')->name('admin.category.hard.delete');
    Route::post('multiple/hard/delete', 'CategoryController@multipleHardDelete')->name('admin.category.multiple.hard.delete');

    // Ajax Routes
    Route::get('/edit/{categoryId}', 'CategoryController@getCategoryNameByAjax');
});

Route::group(['prefix' => 'admin/academic', 'namespace' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::group(['prefix' => 'class'], function () {
        Route::get('/', 'ClassController@index')->name('admin.class.index');
        Route::post('store', 'ClassController@store')->name('admin.class.store');

        Route::post('update/{classId}', 'ClassController@update')->name('admin.class.update');

        Route::get('status/change/{classId}', 'ClassController@changeStatus')->name('admin.class.status.update');

        Route::get('hard/delete/{classId}', 'ClassController@hardDelete')->name('admin.class.hard.delete');
        Route::post('multiple/hard/delete', 'ClassController@multipleHardDelete')->name('admin.class.multiple.hard.delete');

        // Ajax Route
        Route::get('edit/{classId}', 'ClassController@edit')->name('admin.class.edit');

    });

    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', 'SubjectController@index')->name('admin.academic.subject.index');
        Route::post('store', 'SubjectController@store')->name('admin.academic.subject.store');
        Route::get('change/status/{subjectId}', 'SubjectController@changeStatus')->name('admin.academic.subject.status.update');
        Route::get('delete/{subjectId}', 'SubjectController@delete')->name('admin.academic.subject.delete');
        Route::post('multiple/delete', 'SubjectController@multipleDelete')->name('admin.academic.subject.multiple.delete');
        Route::get('edit/{subjectId}', 'SubjectController@edit')->name('admin.academic.subject.edit');
        Route::patch('update/{subjectId}', 'SubjectController@update')->name('admin.academic.subject.update');

        // Ajax Route
        Route::get('edit/{subjectId}', 'SubjectController@edit')->name('admin.academic.subject.edit');
    });

    Route::group(['prefix' => 'section'], function () {
        Route::get('/', 'SectionController@index')->name('admin.academic.section.index');
        Route::post('store', 'SectionController@store')->name('admin.academic.section.store');
        Route::patch('update', 'SectionController@update')->name('admin.academic.section.update');
        Route::get('delete/{section}', 'SectionController@delete')->name('admin.academic.delete');
        Route::post('multiple/delete', 'SectionController@multipleDelete')->name('admin.academic.section.multiple.delete');
        Route::get('change/status/{section}', 'SectionController@changeStatus')->name('admin.academic.section.status.update');

         // Ajax Routes
         Route::get('/edit/{sectionId}', 'SectionController@getSectionByAjax');
    });

    Route::group(['prefix' => 'assign/subjects'], function () {
        Route::get('/', 'AcademicAssignController@allAssignedSubject')->name('admin.academic.assign.all.assigned.subject');
        Route::post('assign', 'AcademicAssignController@subjectAssign')->name('admin.academic.assign.subject.class');
        Route::patch('update', 'AcademicAssignController@subjectAssignUpdate')->name('admin.academic.assign.subject.class.update');
        Route::get('delete/{classSectionId}', 'AcademicAssignController@subjectAssignDelete')->name('admin.academic.assign.subject.class.delete');

        // Ajax Routes
        Route::get('get/sections/by/{classId}', 'AcademicAssignController@getSectionByAjax');
        Route::get('get/assigned/subject/{classSectionId}', 'AcademicAssignController@getAssignedSubjectByAjax');

    });

    Route::group(['prefix' => 'assign/class/teachers'], function () {
        Route::get('/', 'AssignClassTeacherController@index')->name('academic.assign.class.teacher.index');
        Route::post('store', 'AssignClassTeacherController@store')->name('admin.academic.assign.class.teacher.store');
        Route::get('delete/{classSectionId}', 'AssignClassTeacherController@delete')->name('academic.assign.class.teacher.delete');
        Route::patch('update/{classSectionId}', 'AssignClassTeacherController@update')->name('academic.assign.class.teacher.update');

        //Ajax Route
        Route::get('/get/sections/by/{classId}', 'AssignClassTeacherController@getSectionByAjax');
        Route::get('edit/{classSectionId}', 'AssignClassTeacherController@edit');
    });

    Route::group(['prefix' => 'assign/subject/teachers'], function () {
        Route::get('/', 'AssignSubjectTeacherController@index')->name('academic.assign.subject.teacher.index');
        Route::post('store', 'AssignSubjectTeacherController@store')->name('academic.assign.subject.teacher.store');
        Route::get('delete/{subjectTeacherId}', 'AssignSubjectTeacherController@delete')->name('academic.assign.subject.teacher.delete');
        Route::get('update/status/{subjectTeacherId}', 'AssignSubjectTeacherController@updateStatus')->name('academic.assign.subject.teacher.status.update');

        //Ajax Route
        Route::get('/get/sections/by/{classId}', 'AssignSubjectTeacherController@getSectionByAjax');
        Route::get('get/subjects/by/classId/sectionId/{classId}/{sectionId}', 'AssignSubjectTeacherController@getSubjectsByClassIdAndSectionId');
    });

    Route::group(['prefix' => 'class/timetable'], function () {
        Route::get('/', 'ClassTimetableController@search')->name('admin.class.timetable.search');
        Route::get('search', 'ClassTimetableController@search')->name('admin.class.timetable.search');
        Route::get('create', 'ClassTimetableController@create')->name('admin.class.timetable.create');
        Route::post('store', 'ClassTimetableController@store')->name('admin.class.timetable.store');
        
        // Ajax route
        Route::get('get/sections/by/{classId}', 'ClassTimetableController@getSectionsByClassId');
        Route::get('list/single/delete/{timetableId}', 'ClassTimetableController@singleTimetableListDelete');
        Route::get('get/timetable/list/{classId}/{sectionId}/{day}', 'ClassTimetableController@getTimetableListByAjax');
        Route::get('get/more/timetable/list/{classId}/{sectionId}', 'ClassTimetableController@getTimetableMoreListByAjax');
    });

});


Route::group(['prefix' => 'admin/attendance', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function() {
    
    Route::group(['prefix' => 'period'], function() {
        route::get('/', 'PeriodAttendanceController@search')->name('admin.attendance.period.attendance.search');
        
        // Ajax Routes
        route::post('store', 'PeriodAttendanceController@store')->name('admin.attendance.period.attendance.store');
        Route::get('get/sections/by/{classId}', 'PeriodAttendanceController@getSectionsByClassId');
        Route::get('get/subjects/by/{classId}/{sectionId}','PeriodAttendanceController@getSubjectsByClassIdAndSectionId');
    });

    Route::group(['prefix' => 'period/by/date'], function() {
        route::get('search', 'PeriodAttendanceModifyController@search')->name('admin.attendance.period.by.date.attendance.search');
        
        // Ajax Routes
        route::post('update', 'PeriodAttendanceModifyController@update')->name('admin.attendance.period.by.date.attendance.update');
        Route::get('get/sections/by/{classId}', 'PeriodAttendanceModifyController@getSectionsByClassId');
        Route::get('get/subjects/by/{classId}/{sectionId}','PeriodAttendanceModifyController@getSubjectsByClassIdAndSectionId');
    });

    Route::group(['prefix' => 'current/day'], function() {
        route::get('/', 'CurrentDayAttendanceController@selectCriteria')->name('admin.attendance.current.day.attendance.select.criteria');

        route::get('search', 'CurrentDayAttendanceController@search')->name('admin.attendance.current.day.attendance.search');
        
        // Ajax Routes
        route::post('store', 'CurrentDayAttendanceController@store')->name('admin.attendance.current.day.attendance.store');
        Route::get('get/sections/by/{classId}', 'CurrentDayAttendanceController@getSectionsByClassId');
        Route::get('get/subjects/by/{classId}/{sectionId}','CurrentDayAttendanceController@getSubjectsByClassIdAndSectionId');
    });

    Route::group(['prefix' => 'current/day/by/date'], function() {
        route::get('/', 'CurrentDayAttendanceByDateController@selectCriteria')->name('admin.attendance.current.day.by.date.attendance.select.criteria');

        route::get('search', 'CurrentDayAttendanceByDateController@search')->name('admin.attendance.current.day.by.date.attendance.search');
        
        // Ajax Routes
        route::post('update', 'CurrentDayAttendanceByDateController@update')->name('admin.attendance.current.day.by.date.attendance.update');
        Route::get('get/sections/by/{classId}', 'CurrentDayAttendanceByDateController@getSectionsByClassId');
        Route::get('get/subjects/by/{classId}/{sectionId}','CurrentDayAttendanceByDateController@getSubjectsByClassIdAndSectionId');
    });
    
});


Route::group(['prefix' => 'admin/exam/master', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function() {
    
    Route::group(['prefix' => 'exam'], function() {

        Route::group(['prefix' => 'terms'], function() {
            Route::get('/', 'ExamTermController@index')->name('admin.exam.master.exam.term.index');
            Route::post('store', 'ExamTermController@store')->name('admin.exam.master.exam.term.store');
            Route::post('update', 'ExamTermController@update')->name('admin.exam.master.exam.term.update');
            Route::get('change/status/{termId}', 'ExamTermController@changeStatus')->name('admin.exam.master.exam.term.update.status');
            Route::get('delete/{termId}', 'ExamTermController@delete')->name('admin.exam.master.exam.term.delete');

            //Ajax Route
            Route::get('edit/{termId}', 'ExamTermController@getTermByAjax');
        });

        Route::group(['prefix' => 'halls'], function() {
            Route::get('/', 'ExamHallController@index')->name('admin.exam.master.exam.hall.index');
            Route::post('store', 'ExamHallController@store')->name('admin.exam.master.exam.hall.store');
            Route::post('update', 'ExamHallController@update')->name('admin.exam.master.exam.hall.update');
            Route::get('change/status/{hallId}', 'ExamHallController@changeStatus')->name('admin.exam.master.exam.hall.update.status');
            Route::get('delete/{hallId}', 'ExamHallController@delete')->name('admin.exam.master.exam.hall.delete');

            //Ajax Route
            Route::get('edit/{hallId}', 'ExamHallController@getHallByAjax');
        });

        Route::group(['prefix' => 'distributions'], function() {
            Route::get('/', 'ExamDistributionController@index')->name('admin.exam.master.exam.distribution.index');
            Route::post('store', 'ExamDistributionController@store')->name('admin.exam.master.exam.distribution.store');
            Route::post('update', 'ExamDistributionController@update')->name('admin.exam.master.exam.distribution.update');
            Route::get('change/status/{distributionId}', 'ExamDistributionController@changeStatus')->name('admin.exam.master.exam.distribution.update.status');
            Route::get('delete/{distributionId}', 'ExamDistributionController@delete')->name('admin.exam.master.exam.distribution.delete');
            //Ajax Route
            Route::get('edit/{distributionId}', 'ExamDistributionController@getDistributionByAjax');
        });

        Route::group(['prefix' => 'exams'], function() {
            Route::get('/', 'ExamController@index')->name('admin.exam.master.exam.index');
            Route::post('store', 'ExamController@store')->name('admin.exam.master.exam.store');
            Route::post('update/{examId}', 'ExamController@update')->name('admin.exam.master.exam.update');
            Route::get('change/status/{examId}', 'ExamController@changeStatus')->name('admin.exam.master.exam.status.update');
            Route::get('delete/{examId}', 'ExamController@delete')->name('admin.exam.master.exam.delete');

            //Ajax Route
            Route::get('edit/{examId}', 'ExamController@getExamByAjax');
        });
        
    });
    
    Route::group(['prefix' => 'schedules'], function() {

        Route::group(['prefix' => 'create'], function() {
            Route::get('/', 'ExamScheduleAddController@createSection')->name('admin.exam.master.schedule.create');
            Route::post('store', 'ExamScheduleAddController@store')->name('admin.exam.master.schedule.store');

            //Ajax Route
            Route::get('get/sections/by/{classId}', 'ExamScheduleAddController@getSectionsByClassIdByAjax');
            Route::get('search', 'ExamScheduleAddController@search')->name('admin.exam.master.schedule.search.class.section.wise.subjects');
        });
  
        Route::group(['prefix' => 'check'], function() {
            Route::get('/', 'ExamScheduleCheckController@index')->name('admin.exam.master.schedule.check.index');
            
            //Ajax Route
            Route::get('get/sections/by/{classId}', 'ExamScheduleCheckController@getSectionsByClassIdByAjax');
            Route::get('search', 'ExamScheduleCheckController@search')
            ->name('admin.exam.master.schedule.search.class.section.wise');

            Route::get('details/{classId}/{sectionId}/{examId}', 'ExamScheduleCheckController@details');
            Route::get('delete/{classId}/{sectionId}/{examId}', 'ExamScheduleCheckController@delete');

        });
  
    });

    
    Route::group(['prefix' => 'mark'], function() {
        
        Route::group(['prefix' => 'grade/range'], function() {
            Route::get('/', 'MarkRangeController@index')->name('admin.exam.master.mark.grade.range.index');
            Route::post('store', 'MarkRangeController@store')->name('admin.exam.master.mark.grade.range.store');
            Route::post('update', 'MarkRangeController@update')->name('admin.exam.master.mark.grade.range.update');
            Route::get('change/status/{markRangeId}', 'MarkRangeController@changeStatus')
            ->name('admin.exam.master.mark.grade.range.change.status');
            Route::get('delete/{markRangeId}', 'MarkRangeController@delete')
            ->name('admin.exam.master.mark.grade.range.delete');
            
            // Ajax Route
            Route::get('edit/{markRangeId}', 'MarkRangeController@getMarkRangeByAjax');
        });

        Route::group(['prefix' => 'entires'], function() {
            Route::get('/', 'MarkEntireController@index')->name('admin.exam.master.mark.entire.index');
            
            // Ajax Route
            Route::get('get/sections/by/{classId}', 'MarkEntireController@getSectionsByAjax');
            Route::get('get/subjects/by/{classId}/{sectionId}', 'MarkEntireController@getSubjectsByAjax');
            Route::get('search', 'MarkEntireController@search')->name('admin.exam.master.mark.entire.search.class.section.wise.subjects');
            Route::post('store', 'MarkEntireController@store')->name('admin.exam.master.mark.entire.store');
        });

        Route::group(['prefix' => 'report/card'], function() {
            Route::get('/', 'ExamReportCardController@index')->name('admin.exam.master.report.card.index');
            
            // Ajax Route
            Route::get('get/sections/by/{classId}', 'ExamReportCardController@getSectionsByAjax');

            Route::get('search', 'ExamReportCardController@search')->name('admin.exam.master.report.card.search.student.class.section.wise');

            Route::get('details/{classId}/{sectionId}/{examId}/{studentId}', 'ExamReportCardController@reportDetails');

            Route::post('multiple/print', 'ExamReportCardController@multiplePrint')->name('admin.exam.master.report.card.multiple.print');
        });
        
    });

    
    Route::group(['prefix' => 'admit/card'], function() {
        
        Route::group(['prefix' => 'designees'], function() {

            Route::get('/','ExamAdmitCardDesignController@index')->name('admin.exam.master.admit.card.design.index');
            
            // ajax routes
            Route::post('store','ExamAdmitCardDesignController@store')->name('admin.exam.master.admit.card.design.store');
            Route::get('change/status/{desingId}','ExamAdmitCardDesignController@changeStatus')->name('admin.exam.master.admit.card.design.change.status');
            Route::post('update/{desingId}','ExamAdmitCardDesignController@update')->name('admin.exam.master.admit.card.design.update');
            Route::get('delete/{desingId}','ExamAdmitCardDesignController@delete')->name('admin.exam.master.admit.card.design.delete');
            Route::get('get/all/templates','ExamAdmitCardDesignController@allTemplates');
            Route::get('edit/{desingId}','ExamAdmitCardDesignController@edit');
            Route::get('show/{desingId}','ExamAdmitCardDesignController@show');
           
        });

        Route::group(['prefix' => 'print'], function() {

            Route::get('/','ExamAdmitCardGenerateController@index')->name('admin.exam.master.admit.card.print.index');

            // Ajax Routes
            Route::get('get/sections/by/{classId}','ExamAdmitCardGenerateController@getSectionByClass'); 
            Route::get('search/student','ExamAdmitCardGenerateController@searchStudent')->name('admin.exam.master.admit.card.print.search.student'); 
            Route::post('print/action','ExamAdmitCardGenerateController@printAction')->name('admin.exam.master.print.admit.card.action');

        });
        
    });
    

});


Route::group(['prefix' => 'admin/transport', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::group(['prefix' => 'route'], function () {
        Route::get('/', 'RouteController@index')->name('admin.route.index');
        Route::post('store', 'RouteController@store')->name('admin.route.store');
        Route::get('status/change/{routeId}', 'RouteController@changeStatus')->name('admin.route.status.update');
        Route::patch('update', 'RouteController@update')->name('admin.route.update');
        Route::get('delete/{routeId}', 'RouteController@delete')->name('admin.route.delete');
        Route::post('multiple/delete', 'RouteController@multipleDelete')->name('admin.route.multiple.delete');

        // Ajax Routes
        Route::get('/edit/{routeId}', 'RouteController@getRouteByAjax');
    });

    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/', 'VehicleController@index')->name('admin.vehicle.index');
        Route::post('store', 'VehicleController@store')->name('admin.vehicle.store');
       // Route::get('edit/{vehicleId}', 'VehicleController@edit')->name('admin.vehicle.edit');
        Route::patch('update/{vehicleId}', 'VehicleController@update')->name('admin.vehicle.update');
        Route::get('delete/{vehicleId}', 'VehicleController@delete')->name('admin.vehicle.delete');
        Route::get('status/update/{vehicleId}', 'VehicleController@statusUpdate')->name('admin.route.status.update');
        Route::post('multiple/delete', 'VehicleController@multipleDelete')->name('admin.vehicle.multiple.delete');

        // Ajax Route
        Route::get('edit/{vehicleId}', 'VehicleController@getVehicleByAjax');
    });

    Route::group(['prefix' => 'assign/vehicle'], function () {
        Route::get('/', 'TransportController@index')->name('admin.assign.vehicle.index');
        Route::post('store', 'TransportController@store')->name('admin.assign.vehicle.store');
        Route::get('edit/{routeId}', 'TransportController@edit')->name('admin.assign.vehicle.edit');
        Route::patch('update/{routeId}', 'TransportController@update')->name('admin.assign.vehicle.update');
        Route::get('delete/{routeId}', 'TransportController@delete')->name('admin.assign.vehicle.delete');
        Route::post('multiple/delete', 'TransportController@multipleDelete')->name('admin.assign.vehicle.multiple.delete');

        // Ajax route
        Route::get('edit/{routeId}', 'TransportController@getAssignedRouteByAjax');
    });

    Route::group(['prefix' => 'assign/vehicle/driver'], function () {
        Route::get('/', 'AssignDriverController@index')->name('admin.assign.vehicle.driver.index');
        Route::post('store', 'AssignDriverController@store')->name('admin.assign.vehicle.driver.store');
        Route::get('delete/{vehicleId}', 'AssignDriverController@delete')->name('admin.assign.vehicle.driver.delete');
      
        // Ajax route
        Route::get('edit/{vehicleId}', 'TransportController@getAssignedRouteByAjax');
    });


});

Route::group(['prefix' => 'admin/expanses', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {

    Route::group(['prefix' => '/'], function () {

        Route::get('all', 'ExpanseController@index')->name('admin.expanse.index');
        Route::post('store', 'ExpanseController@store')->name('admin.expanse.store');
        Route::get('edit/{expanseId}', 'ExpanseController@edit')->name('admin.expanse.edit');
        Route::patch('update/{expanseId}', 'ExpanseController@update')->name('admin.expanse.update');
        Route::get('status/change/{expanseId}', 'ExpanseController@statusChange')->name('admin.expanse.status.update');
        Route::get('delete/{expanseId}', 'ExpanseController@delete')->name('admin.expanse.delete');
        Route::post('multiple/delete', 'ExpanseController@multipleDelete')->name('admin.expanse.multiple.delete');
        Route::get('search', 'ExpanseController@search')->name('admin.expanse.search');
        Route::get('search/action', 'ExpanseController@searchAction')->name('admin.expanse.search.action');

        //Ajax route
        Route::get('edit/{expanseId}', 'ExpanseController@getExpanseByAjax');

    });

    Route::group(['prefix' => 'headers'], function () {
        Route::get('/', 'ExpanseHeaderController@index')->name('admin.expanse.header.all');
        Route::post('store', 'ExpanseHeaderController@store')->name('admin.expanse.header.store');
        Route::get('status/update/{headerId}', 'ExpanseHeaderController@changeStatus')->name('admin.expanse.header.status.update');
        Route::get('delete/{headerId}', 'ExpanseHeaderController@delete')->name('admin.expanse.header.delete');
        Route::post('multiple/delete', 'ExpanseHeaderController@multipleDelete')->name('admin.expanse.header.multiple.delete');
        Route::patch('update', 'ExpanseHeaderController@update')->name('admin.expanse.header.update');

        // Ajax Routes
        Route::get('edit/{headerId}', 'ExpanseHeaderController@getHeaderByAjax');
    });

});


Route::group(['prefix' => 'admin/attachment', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function() {
    
    Route::group(['prefix' => 'types'], function() {
        Route::get('/', 'AttachmentTypeController@index')->name('admin.attachment.type.index');
        Route::get('change/status/{attachmentTypeId}', 'AttachmentTypeController@changeStatus')->name('admin.attachment.type.change.status');
        Route::post('store', 'AttachmentTypeController@store')->name('admin.attachment.type.store');
        Route::patch('update', 'AttachmentTypeController@update')->name('admin.attachment.type.update');
        Route::get('delete/{attachmentTypeId}', 'AttachmentTypeController@delete')->name('admin.attachment.type.delete');

        //Ajax Route
        Route::get('edit/{attachmentTypeId}', 'AttachmentTypeController@getAttachmentTypeByAjax');
        
    });

    Route::group(['prefix' => 'upload/contents'], function() {
        Route::get('/', 'AttachmentUploadContentController@index')->name('admin.attachment.upload.content.index');
        Route::post('store', 'AttachmentUploadContentController@store')->name('admin.attachment.upload.content.store');
        Route::get('change/status/{uploadContentId}', 'AttachmentUploadContentController@changeStatus')->name('admin.attachment.upload.content.change.status');
        Route::get('delete/{uploadContentId}', 'AttachmentUploadContentController@delete')->name('admin.attachment.upload.content.delete');
        Route::post('update/{uploadContentId}', 'AttachmentUploadContentController@update')->name('admin.attachment.upload.content.update');
   
        //Ajax Route
        Route::get('get/subjects/by/{classId}', 'AttachmentUploadContentController@getSubjectsByAjax');
        Route::get('edit/{classId}', 'AttachmentUploadContentController@edit');
    });
    
});


Route::group(['prefix' => 'admin/incomes', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {

    Route::group(['prefix' => '/'], function () {

        Route::get('all', 'IncomeController@index')->name('admin.income.index');
        Route::post('store', 'IncomeController@store')->name('admin.income.store');
        Route::get('edit/{incomeId}', 'IncomeController@edit')->name('admin.income.edit');
        Route::patch('update/{incomeId}', 'IncomeController@update')->name('admin.income.update');
        Route::get('status/change/{incomeId}', 'IncomeController@statusChange')->name('admin.income.status.update');
        Route::get('delete/{incomeId}', 'IncomeController@delete')->name('admin.income.delete');
        Route::post('multiple/delete', 'IncomeController@multipleDelete')->name('admin.income.multiple.delete');
        Route::get('search', 'IncomeController@search')->name('admin.income.search');
        Route::get('search/action', 'IncomeController@searchAction')->name('admin.income.search.action');

        //Ajax route
        Route::get('edit/{incomeId}', 'IncomeController@getIncomeByAjax');

    });

    Route::group(['prefix' => 'headers'], function () {
        Route::get('/', 'IncomeHeaderController@index')->name('admin.income.header.all');
        Route::post('store', 'IncomeHeaderController@store')->name('admin.income.header.store');
        Route::get('status/update/{headerId}', 'IncomeHeaderController@changeStatus')->name('admin.income.header.status.update');
        Route::get('delete/{headerId}', 'IncomeHeaderController@delete')->name('admin.income.header.delete');
        Route::post('multiple/delete', 'IncomeHeaderController@multipleDelete')->name('admin.income.header.multiple.delete');
        Route::patch('update', 'IncomeHeaderController@update')->name('admin.income.header.update');

        // Ajax Routes
        Route::get('edit/{headerId}', 'IncomeHeaderController@getHeaderByAjax');
    });

});

Route::group(['prefix' => 'admin/employees', 'namespace' => 'Admin'], function () {


    Route::group(['prefix' => 'department'], function () {

        Route::get('/', 'DepartmentController@index')->name('admin.employee.department.index');
        Route::post('store', 'DepartmentController@store')->name('admin.employee.department.store');
        Route::patch('update', 'DepartmentController@update')->name('admin.employee.department.update');
        Route::get('status/change/{departmentId}', 'DepartmentController@changeStatus')
        ->name('admin.employee.department.status.update');
        Route::get('hard/delete/{departmentId}', 'DepartmentController@hardDelete')
        ->name('admin.employee.department.hard.delete');
        Route::post('multiple/hard/delete', 'DepartmentController@multipleHardDelete')
        ->name('admin.employee.department.multiple.hard.delete');
    
        // Ajax Routes
        Route::get('/edit/{departmentId}', 'DepartmentController@getDepartmentNameByAjax');
    });

    Route::get('admins', 'EmployeeController@index')->name('admin.employee.all.admins');
    Route::get('teachers', 'EmployeeController@teachers')->name('admin.employee.all.teacher');
    Route::get('librarians', 'EmployeeController@librarians')->name('admin.employee.all.librarian');
    Route::get('accountants', 'EmployeeController@accountant')->name('admin.employee.all.accountant');
    Route::get('clerk', 'EmployeeController@clerks')->name('admin.employee.all.clerk');
    Route::get('drivers', 'EmployeeController@drivers')->name('admin.employee.all.driver');
    Route::get('guards', 'EmployeeController@guards')->name('admin.employee.all.guard');
    Route::get('create', 'EmployeeController@create')->name('admin.employee.create');
    Route::post('store', 'EmployeeController@store')->name('admin.employee.store');
    Route::get('edit/{employeeId}', 'EmployeeController@edit')->name('admin.employee.edit');
    Route::post('update/basic/details/{employeeId}', 'EmployeeController@updateBasicDetails')->name('admin.employee.update.basic.details');
    Route::post('update/academic/details/{employeeId}', 'EmployeeController@updateAcademicDetails')->name('admin.employee.update.academic.details');
    Route::get('change/status/{employeeId}', 'EmployeeController@changeStatus')->name('admin.employee.status.update');
    Route::get('delete/{employeeId}', 'EmployeeController@delete')->name('admin.employee.delete');
    Route::patch('bank/update/{employeeId}', 'EmployeeController@bankUpdate')->name('admin.employee.bank.update');

    // Ajax Route
    Route::get('bank/edit/{employeeId}', 'EmployeeController@editBank');
});


Route::group(['prefix' => 'admin/secdepartment', 'namespace' => 'Admin'], function () {
    Route::get('/add', 'DepartmentController@index')->name('admin.department.index');
    Route::post('/submit', 'DepartmentController@store')->name('admin.department.store');
    Route::get('/active/{id}', 'DepartmentController@active');
    Route::get('/deactive/{id}', 'DepartmentController@deactive');
    Route::get('/delete/{id}', 'DepartmentController@delete');
    Route::get('/edit/{categoryId}', 'DepartmentController@edit');
    Route::post('/update', 'DepartmentController@update')->name('admin.secdepartment.update');
 
}); 
Route::group(['prefix' => 'admin/secdesignation', 'namespace' => 'Admin'], function () {
    
    Route::get('/add', 'DepartmentController@designationindex')->name('admin.secdesignation.index');
   
 
});


Route::group(['prefix' => 'admin/office/accounts', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function() {
    
    Route::group(['prefix' => 'bank'], function() {
        Route::get('/', 'AccountBankControllerContentController@index')->name('admin.office.account.bank.index');
        Route::post('store', 'AccountBankControllerContentController@store')->name('admin.office.account.bank.store');
        Route::get('status/change/{bankId}', 'AccountBankControllerContentController@changeStatus')->name('admin.office.account.bank.change.status');
        Route::get('delete/{bankId}', 'AccountBankControllerContentController@delete')->name('admin.office.account.bank.delete');
        Route::post('update/{bankId}', 'AccountBankControllerContentController@update')->name('admin.office.account.bank.update');

        //Ajax Route
        Route::get('edit/{bankId}', 'AccountBankControllerContentController@edit');
    });


    Route::group(['prefix' => 'bank_accounts'], function() {
        Route::get('/', 'BankAccountController@index')->name('admin.office.account.bank.account.index');
        Route::post('store', 'BankAccountController@store')->name('admin.office.account.bank.account.store');

        Route::get('status/change/{accountId}', 'BankAccountController@changeStatus')->name('admin.office.account.bank.account.change.status');
        Route::get('delete/{accountId}', 'BankAccountController@delete')->name('admin.office.account.bank.account.delete');
        Route::post('update/{accountId}', 'BankAccountController@update')->name('admin.office.account.bank.account.update');

        //Ajax Route
        
        Route::get('edit/{accountId}', 'BankAccountController@edit');
        
        
    });


    Route::group(['prefix' => 'deposits'], function() {
        Route::get('/', 'AccountDepositContentController@index')->name('admin.office.account.deposit.index');
        
        //Ajax Route
        Route::post('store', 'AccountDepositContentController@store')->name('admin.office.account.deposit.store');
        Route::get('edit/{depositId}', 'AccountDepositContentController@edit');
        Route::post('update/{depositId}', 'AccountDepositContentController@update')->name('admin.office.account.deposit.update');
        Route::get('change/status/{depositId}', 'AccountDepositContentController@changeStatus')->name('admin.office.account.deposit.change.status');
        Route::get('delete/{depositId}', 'AccountDepositContentController@delete')->name('admin.office.account.deposit.delete');
        Route::get('get/account/by/{bankId}', 'AccountDepositContentController@getAccountsByAjax');
        Route::get('get/account/number/by/{accountId}', 'AccountDepositContentController@getAccountNumberByAjax');
        Route::get('all', 'AccountDepositContentController@allDeposits');
        
    });

    Route::group(['prefix' => 'withdraws'], function() {
        Route::get('/', 'AccountWithdrawController@index')->name('admin.office.account.withdraw.index');
        
        //Ajax Route
        Route::post('store', 'AccountWithdrawController@store')->name('admin.office.account.withdraw.store');
        Route::get('edit/{withdrawId}', 'AccountWithdrawController@edit');
        Route::post('update/{withdrawId}', 'AccountWithdrawController@update')->name('admin.office.account.withdraw.update');
        Route::get('change/status/{withdrawId}', 'AccountWithdrawController@changeStatus')->name('admin.office.account.withdraw.change.status');
        Route::get('delete/{withdrawId}', 'AccountWithdrawController@delete')->name('admin.office.account.withdraw.delete');
        Route::get('get/account/by/{bankId}', 'AccountWithdrawController@getAccountsByAjax');
        Route::get('get/account/number/by/{accountId}', 'AccountWithdrawController@getAccountNumberByAjax');
        Route::get('all', 'AccountWithdrawController@allWithdraws');
        
    });

    Route::group(['prefix' => 'voucher/header'], function() {
        Route::get('/', 'AccountVoucherHeaderController@index')->name('admin.office.account.voucher_header.index');
        Route::post('store', 'AccountVoucherHeaderController@store')->name('admin.office.account.voucher_header.store');
        Route::get('change/status/{voucherHeaderId}', 'AccountVoucherHeaderController@changeStatus')->name('admin.office.account.voucher_header.change.status');
        Route::post('update', 'AccountVoucherHeaderController@update')->name('admin.office.account.voucher_header.update');
        Route::get('delete/{voucherHeaderId}', 'AccountVoucherHeaderController@delete')->name('admin.office.account.voucher_header.delete');
        //Ajax Route
        
        Route::get('edit/{voucherHeaderId}', 'AccountVoucherHeaderController@edit');
        
        
        
    });
    
});

// Communication routes

Route::group(['prefix' => 'admin/communication', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function() {
    
    Route::group(['prefix' => 'message/via/email'], function() {
        Route::get('/', 'MessageController@inbox')->name('admin.communication.message.inbox');
        Route::get('details/{mailId}', 'MessageController@details')->name('admin.communication.message.details');
        Route::post('send/replay', 'MessageController@sendReply')->name('admin.communication.message.send.reply');
        Route::get('send/mail/section', 'MessageController@sendMailSection')->name('admin.communication.message.send.mail.section');
        Route::post('send/mail', 'MessageController@sendMail')->name('admin.communication.message.send.mail');
        Route::get('draft/mail/section', 'MessageController@draftMailSection')->name('admin.communication.message.draft.mail.section');
        Route::post('send/drafted/reply/mail/', 'MessageController@sendDraftedReplyMail')->name('admin.communication.message.send.draft.mail.reply');
        Route::post('send/drafted/send/mail/', 'MessageController@sendDraftedSendMail')->name('admin.communication.message.send.draft.send.mail');
        Route::post('inbox/message/delete', 'MessageController@inboxMessageDelete')->name('admin.communication.message.inbox.message.deleted');
        Route::get('bulk/mail/compose/section', 'MessageController@bulkMailComposeSection')->name('admin.communication.message.bulk.mail.compose.section');
        Route::get('bulk/mail/drafted/compose/{draftId}', 'MessageController@bulkMailDraftedComposeSection')->name('admin.communication.message.drafted.bulk.mail');
        Route::post('send/bulk/mail', 'MessageController@sendBulkMail')->name('admin.communication.message.send.bulk.mail');
        Route::get('mail/trashes', 'MessageController@mailTrashes')->name('admin.communication.message.mail.trashes');
        Route::post('trash/mail/delete', 'MessageController@mTrashMailDelete')->name('admin.communication.message.trash.mail.delete');
        Route::get('refactor/trash/mail/{trashMailId}', 'MessageController@refactorTrashMail')->name('admin.communication.message.refactor.trash.mail');
        Route::get('draft/mail/delete/{draftId}', 'MessageController@draftMailDelete')->name('admin.communication.message.draft.mail.delete');

        // Ajax routes
        Route::get('get/draft/mail/details/{draftId}', 'MessageController@getDraftMailDetails');
        Route::get('get/stuff/by/{roleId}', 'MessageController@getStaffByRollId');
    });
    
});

// Communication routes End



// Hostel  area start
Route::group(['prefix'=>'admin/hostel','namespace'=>'Admin'],function(){

    Route::get('/','HostelController@index')->name('admin.hostel');
    Route::post('/store','HostelController@store')->name('hostel.store');
    Route::get('/edit/{id}','HostelController@edit')->name('hostel.edit');
    Route::PATCH('/update','HostelController@update')->name('hostel.update');
    Route::get('/status/update/{id}','HostelController@statusUpdate')->name('hostel.status.update');
    Route::post('/hostel/multidelete','HostelController@hostelMultiDelete')->name('hostel.multidelete');
    Route::get('/delete/{id}','HostelController@destroy')->name('hostel.destroy');

    Route::get('/add/room/','HostelController@hostelroom')->name('hostel.addroom');
    Route::post('/submit/room/','HostelController@hostelroomstore')->name('hostelroom.store');
    Route::get('/hostelroom/active/{id}','HostelController@hostelroomactive');
    Route::get('/hostelroom/deactive/{id}','HostelController@hostelroomdeactive');
    Route::get('/hostelroom/delete/{id}','HostelController@hostelroomdelete');
    Route::get('/hostelroom/edit/{id}','HostelController@hostelroomedit');
    Route::post('/hostelroom/update','HostelController@hostelroomupdate')->name('hostelroom.update');
    Route::post('/hostelroom/multidelete','HostelController@hostelroommultidel')->name('hostelroom.multidelete');

    Route::group(['prefix'=>'room/type'],function(){
        Route::get('/','RoomTypeController@index')->name('room.type');
        Route::post('/store','RoomTypeController@store')->name('hostel.room.type.store');
        Route::get('/edit/{id}','RoomTypeController@edit');
        Route::PATCH('/update','RoomTypeController@update')->name('room.type.update');
        Route::post('/multidelete','RoomTypeController@multipleDelete')->name('room.type.multidelete');
        Route::get('/status/update/{id}','RoomTypeController@changeStatus')->name('room.type.status.update');
        Route::get('/delete/{id}','RoomTypeController@destroy')->name('room.type.delete');
    });
});
// Hostel area end

Route::group(['prefix' => 'admin/student', 'namespace' => 'Admin'], function () {

    Route::get('/create', 'StudentAdmissionController@create')->name('student.create');
    Route::post('/update/{id}', 'StudentAdmissionController@update')->name('student.update');
    Route::get('/all', 'StudentAdmissionController@index')->name('student.index');
    Route::get('/edit/{id}', 'StudentAdmissionController@edit');
    Route::post('/submit', 'StudentAdmissionController@store')->name('student.insert');
    Route::get('/section/all/{id}', 'StudentAdmissionController@getsection');
    Route::get('/route/{id}', 'StudentAdmissionController@getbus');
    Route::get('/get/hostel/{id}','StudentAdmissionController@getroom');

});

Route::group(['prefix' => 'admin/event', 'namespace' => 'Admin'], function () {

    Route::get('/create', 'EventController@create')->name('event.create');
    Route::post('/create/submit', 'EventController@store')->name('event.submit');
    Route::get('/all', 'EventController@index')->name('event.index.all');
 

});

// Inventory area start
Route::group(['prefix'=>'admin/inventory','namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'category'],function(){
        Route::get('/','InventoryController@categoryIndex')->name('inventory.category.index');
        Route::post('/store','InventoryController@categoryStore')->name('inventory.category.store');
        Route::get('/edit/{id}','InventoryController@categoryEdit');
        Route::patch('/update','InventoryController@categoryUpdate')->name('inventory.category.update');
        Route::get('/delete/{id}','InventoryController@categoryDelete')->name('inventory.category.delete');
        Route::post('/category/multidelete','InventoryController@categoryMultiDelete')->name('inventory.category.multidelete');
    });


    Route::group(['prefix'=>'item'],function(){
        Route::get('/','InventoryController@itemIndex')->name('item.index');
        Route::post('/store','InventoryController@itemStore')->name('category.item.store');
        Route::get('/edit/{id}','InventoryController@itemEdit');
        Route::patch('/update','InventoryController@itemUpdate')->name('inventory.item.update');
        Route::get('/update/status/{id}','InventoryController@itemStatus')->name('inventory.item.status.update');
        Route::post('/multidelete','InventoryController@itemMultiDelete')->name('inventory.item.multidelete');
        Route::get('/delete/{id}','InventoryController@itemDelete')->name('inventory.item.delete');


        Route::get('/add/items','InventoryController@addItems')->name('admin.item.index');
        Route::post('/add/items/create','InventoryController@itemsStore')->name('admin.item.create');
        Route::get('/items/edit/{id}','InventoryController@itemsEdit');
        Route::patch('/items/update','InventoryController@itemsUpdate')->name('admin.items.update');
        Route::get('/items/delete/{id}','InventoryController@itemsDelete')->name('admin.items.delete');
        Route::get('/items/status/update/{id}','InventoryController@itemsStatusUpdate')->name('admin.items.status.update');
        Route::post('/items/multi/delete','InventoryController@itemsMultiDelete')->name('admin.items.multi.delete');
    });

    Route::group(['prefix'=>'supplier'],function(){
        Route::get('/','InventoryController@supplierIndex')->name('admin.inventory.supplier');
        Route::post('/store','InventoryController@supplierStore')->name('inventory.supplier.store');
        Route::get('/edit/{id}','InventoryController@supplierEdit');

        Route::patch('/update','InventoryController@supplierUpdate')->name('inventory.supplier.update');
        Route::get('/delete/{id}','InventoryController@supplierDelete')->name('inventory.supplier.delete');
        Route::post('/multi/delete','InventoryController@supplierMultiDelete')->name('admin.inventory.supplier.multidelete');


    });

    Route::group(['prefix'=>'item/stock'],function(){

        Route::get('/','InventoryController@stockItemIndex')->name('inventory.item.stock.index');
        Route::post('/store','InventoryController@stockItemStore')->name('inventory.item.stock.create');

        Route::get('/edit/{id}','InventoryController@stockItemEdit');

    });

});





Route::get('/online/user', 'HomeController@onlineUser')->name('online.user');


// Inventory area end


Auth::routes();

use App\Admin;

use App\MarkEntires;
use Illuminate\Support\Facades\Hash;

Route::get('add_admin', function() {
    Admin::insert([
        'adminname' => 'Admin',
        'phone' => '01854284712',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456789'),
        'role' => '1',
    ]);
});

Route::get('test', function(){
    
  $mark = MarkEntires::first();

 return  count(json_decode($mark->mark_distributions));
   
});




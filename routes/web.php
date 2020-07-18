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
    Route::post('/logout', 'AuthController@logout')->name('admin.logout');
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
    Route::group(['prefix' => 'session'], function () {
        Route::get('/', 'SessionYearController@index')->name('admin.academic.session.index');
        Route::post('store', 'SessionYearController@store')->name('admin.academic.session.store');

        Route::post('update', 'SessionYearController@update')->name('admin.academic.session.update');

        Route::get('status/change/{sessionId}', 'SessionYearController@changeStatus')->name('admin.academic.session.status.update');

        Route::get('delete/{sessionId}', 'SessionYearController@delete')->name('admin.academic.session.delete');

        // Ajax Route
        Route::get('edit/{sessionId}', 'SessionYearController@edit');

    });
    
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

    Route::group(['prefix' => 'teacher/timetable'], function () {
        Route::get('/', 'TeacherTimeController@index')->name('admin.academic.teacher.timetable.index');
        Route::get('search', 'TeacherTimeController@search')->name('admin.academic.teacher.timetable.search');
 
        // Ajax route
      
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
    
    Route::group(['prefix' => 'exam/attendance'], function() {

        route::get('/', 'ExamAttendanceController@index')->name('admin.attendance.exam.attendance.index');

        // Ajax Routes
        route::get('day/get/sections/by/{classId}', 'ExamAttendanceController@getSectionsByClassId');

        route::get('get/subjects/by/class/section/id/{classId}/{sectionId}', 'ExamAttendanceController@getSubjectsByClassSectionId');
        route::get('search', 'ExamAttendanceController@search')->name('admin.attendance.exam.attendance.search');
        route::post('store', 'ExamAttendanceController@store')->name('admin.attendance.exam.attendance.store');
    });
    
    Route::group(['prefix' => 'exam/attendance/modify'], function() {
        route::get('/', 'ExamAttendanceModifyController@index')->name('admin.attendance.exam.attendance.modify.index');

        // Ajax Routes
        route::get('day/get/sections/by/{classId}','ExamAttendanceModifyController@getSectionsByClassId');
        
        route::get('get/subjects/by/class/section/id/{classId}/{sectionId}', 'ExamAttendanceModifyController@getSubjectsByClassSectionId');

        route::get('get/exams/by/{sessionId}', 'ExamAttendanceModifyController@getExamsByAjax');

        route::get('search', 'ExamAttendanceModifyController@search')->name('admin.attendance.exam.attendance.modify.search');

        route::post('modify', 'ExamAttendanceModifyController@modify')->name('admin.attendance.exam.attendance.modify');

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
            Route::get('get/exams/by/{session}', 'ExamScheduleAddController@getExamsBySessionId');
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
            Route::get('/get/exams/by/{sessionId}', 'MarkEntireController@getExamsByAjax');
            Route::get('get/subjects/by/{classId}/{sectionId}', 'MarkEntireController@getSubjectsByAjax');
            Route::get('search', 'MarkEntireController@search')->name('admin.exam.master.mark.entire.search.class.section.wise.subjects');
            Route::post('store', 'MarkEntireController@store')->name('admin.exam.master.mark.entire.store');
        });

        Route::group(['prefix' => 'report/card'], function() {
            Route::get('/', 'ExamReportCardController@index')->name('admin.exam.master.report.card.index');
            
            // Ajax Route
            Route::get('get/sections/by/{classId}', 'ExamReportCardController@getSectionsByAjax');
            Route::get('get/exams/by/{sessionId}', 'ExamReportCardController@getExamsByAjax');

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
            Route::get('get/exams/by/{sessionId}', 'ExamAdmitCardGenerateController@getExamsByAjax');
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

    

    Route::get('all/admins', 'EmployeeController@index')->name('admin.employee.all.admins');
    Route::get('all/super/admins', 'EmployeeController@superAdmins')->name('admin.employee.all.super.admins');
    Route::get('all/teachers', 'EmployeeController@teachers')->name('admin.employee.all.teacher');
    Route::get('all/librarians', 'EmployeeController@librarians')->name('admin.employee.all.librarian');
    Route::get('all/accountants', 'EmployeeController@accountant')->name('admin.employee.all.accountant');
    Route::get('all/clerk', 'EmployeeController@clerks')->name('admin.employee.all.clerk');
    Route::get('all/drivers', 'EmployeeController@drivers')->name('admin.employee.all.driver');
    Route::get('all/guards', 'EmployeeController@guards')->name('admin.employee.all.guard');
    Route::get('create', 'EmployeeController@create')->name('admin.employee.create');
    Route::post('store', 'EmployeeController@store')->name('admin.employee.store');
    Route::get('edit/{employeeId}', 'EmployeeController@edit')->name('admin.employee.edit');

    Route::post('update/basic/details/{employeeId}', 'EmployeeController@updateBasicDetails')->name('admin.employee.update.basic.details');

    Route::post('update/academic/details/{employeeId}', 'EmployeeController@updateAcademicDetails')->name('admin.employee.update.academic.details');
    
    Route::post('update/contract/details/{employeeId}', 'EmployeeController@updateContractDetails')->name('admin.employee.update.contract.details');

    Route::get('change/status/{employeeId}', 'EmployeeController@changeStatus')->name('admin.employee.status.update');

    Route::get('delete/{employeeId}', 'EmployeeController@delete')->name('admin.employee.delete');

    Route::patch('bank/update/{employeeId}', 'EmployeeController@bankUpdate')->name('admin.employee.bank.update');
    
    Route::post('social/links/update/{employeeId}', 'EmployeeController@socialLinksUpdate')->name('admin.employee.social.links.update');

    Route::post('authentication/{employeeId}', 'EmployeeController@authenticationUpdate')->name('admin.employee.authentication.update');
    // Ajax Route
    Route::get('bank/edit/{employeeId}', 'EmployeeController@editBank');
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

// Student routes group
Route::group(['prefix' => 'admin/student', 'namespace' => 'Admin'], function () {

    Route::get('/create', 'StudentAdmissionController@create')->name('student.create');
    Route::post('/update/{id}', 'StudentAdmissionController@update')->name('student.update');
    Route::get('/all', 'StudentAdmissionController@index')->name('student.index');
    Route::get('details/{studentId}', 'StudentAdmissionController@details')->name('student.details');
    Route::get('status/update/{studentId}', 'StudentAdmissionController@StatusUpdate')->name('student.status.update');
    Route::get('/edit/{id}', 'StudentAdmissionController@edit');
    Route::post('/submit', 'StudentAdmissionController@store')->name('student.insert');
    Route::get('/section/all/{id}', 'StudentAdmissionController@getsection');
    Route::get('/get/sections/by/{classId}', 'StudentAdmissionController@getSectionsByClassId');

    Route::get('get/students/by/{classId}/{sectionId}', 'StudentAdmissionController@getStudentsByClassIdAndSectionId');
    
    Route::get('get/student/by/{studentId}', 'StudentAdmissionController@getStudentByStudentId');

    Route::get('/route/{id}', 'StudentAdmissionController@getbus');
    Route::get('/get/hostel/{id}','StudentAdmissionController@getroom');

});
// Student routes group End

// Event routes group
Route::group(['prefix' => 'admin/event', 'namespace' => 'Admin'], function () {

    Route::get('/create', 'EventController@create')->name('event.create');
    Route::get('edit/{eventId}', 'EventController@edit')->name('event.edit');
    Route::get('delete/{eventId}', 'EventController@delete')->name('event.delete');
    Route::get('update/status/{eventId}', 'EventController@updateStatus')->name('event.status.update');
    Route::post('update/{eventId}', 'EventController@update')->name('event.update');
    Route::post('/create/submit', 'EventController@store')->name('event.submit');
    Route::get('/all', 'EventController@index')->name('event.index.all');

});
// Event routes group End


// Human Resource routes group
    
    Route::group(['prefix' => 'admin/human_resource', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function() {
        
        
        Route::group(['prefix' => 'employee/attendance'], function() {
            
            Route::get('/', 'EmployeeAttendanceController@index')->name('admin.hr.employee.attendance.index');
            
            Route::get('search', 'EmployeeAttendanceController@search')->name('admin.hr.employee.attendance.search');

            Route::post('store', 'EmployeeAttendanceController@store')->name('admin.hr.employee.attendance.store');

            Route::post('update', 'EmployeeAttendanceController@update')->name('admin.hr.employee.attendance.update');

        });
        
        Route::group(['prefix' => 'employee/salary'], function() {
            
            Route::get('/', 'EmployeeSalaryController@index')->name('admin.hr.employee.salary.index');
            
            Route::get('search', 'EmployeeSalaryController@search')->name('admin.hr.employee.salary.search');
            
            Route::get('generate/view/{employeeId}/{month}/{year}', 'EmployeeSalaryController@generateView')->name('admin.hr.employee.salary.generate.view');
            
            Route::post('generate/{employeeId}', 'EmployeeSalaryController@salaryGenerate')->name('admin.hr.employee.salary.generate');
            
            Route::get('salary/pay/view/{employeeId}/{month}/{year}', 'EmployeeSalaryController@salaryPayView')->name('admin.hr.employee.salary.pay.view');

            Route::post('salary/pay/{employeeId}', 'EmployeeSalaryController@salaryPay')->name('admin.hr.employee.salary.pay');
            
            Route::get('salary/pay/slip/{employeeId}/{month}/{year}', 'EmployeeSalaryController@salaryPaySlip')->name('admin.hr.employee.salary.pay.slip');

        });
        
        Route::group(['prefix' => 'leave/type'], function () {
            Route::get('/', 'LeaveTypeController@index')->name('admin.hr.leave.type.index');
            Route::post('store', 'LeaveTypeController@store')->name('admin.hr.leave.type.store');
    
            Route::patch('update', 'LeaveTypeController@update')->name('admin.hr.leave.type.update');
    
            Route::get('status/change/{leaveTypeId}', 'LeaveTypeController@changeStatus')->name('admin.hr.leave.type.status.update');
    
            Route::get('delete/{leaveTypeId}', 'LeaveTypeController@delete')->name('admin.hr.leave.type.delete');
          
            // Ajax Route
            Route::get('edit/{leaveTypeId}', 'LeaveTypeController@edit')->name('admin.hr.leave.type.edit');
    
        });
        
        Route::group(['prefix' => 'leave/apply'], function () {
            Route::get('/', 'LeaveApplyController@index')->name('admin.hr.leave.apply.index');
            Route::post('store', 'LeaveApplyController@store')->name('admin.hr.leave.apply.store');
    
          
            // Ajax Route
            Route::get('details/{leaveApplyId}', 'LeaveApplyController@details')->name('admin.hr.leave.apply.details');
        });
        
        Route::group(['prefix' => 'leave/approval'], function () {
            Route::get('/', 'LeaveApprovalController@index')->name('admin.hr.leave.approval.index');
            Route::post('action', 'LeaveApprovalController@action')->name('admin.hr.leave.approval.action');

            // Ajax Route
            
        });

    });
    
// Human Resource routes group End

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

Route::group(['prefix'=>'admin/library','namespace'=>'Admin'],function(){

    Route::group(['prefix'=>'books'],function(){

        Route::get('/','LibraryController@bookList')->name('admin.book.index');
        Route::get('/delete/{id}','LibraryController@bookDelete')->name('admin.book.delete');
        Route::get('/status/{id}','LibraryController@bookStatus')->name('admin.book.status');
        Route::get('/edit/{id}','LibraryController@bookEdit');
        Route::post('/store','LibraryController@bookStore')->name('admin.library.book.store');
        Route::post('/muli/delete','LibraryController@bookMultiDelete')->name('admin.book.multidelete');
        Route::PATCH('/update','LibraryController@bookUpdate')->name('admin.library.book.update');
        
    });

    Route::group(['prefix'=>'member'],function(){
        Route::get('/','LibraryController@libraryList')->name('admin.library.members');
        Route::post('/store','LibraryController@libraryMemberStore')->name('admin.library.members.store');
        Route::get('/name/{id}','LibraryController@libraryMemberName');
        Route::get('/info/{id}','LibraryController@libraryMemberInfo');
        Route::get('/status/{id}','LibraryController@libraryMemberStatus')->name('admin.library.status');
        Route::get('/edit/{id}','LibraryController@libraryMemberEdit');
        Route::get('/delete/{id}','LibraryController@libraryMemberDelete')->name('admin.library.member.delete');
        Route::post('/update','LibraryController@libraryMemberUpdate')->name('admin.library.members.update');
        Route::post('/multi/delete','LibraryController@libraryMemberMultiDelete')->name('admin.library.member.multidelete');
    });

    Route::group(['prefix' => 'staff'],function(){
        Route::get('/','LibraryController@libraryStaffList')->name('admin.library.staff');
        Route::get('/edit/{id}','LibraryController@libraryStaffEdit');
        Route::post('/store','LibraryController@libraryStaffStore')->name('admin.library.staff.store');
        Route::patch('/update','LibraryController@libraryStaffUpdate')->name('admin.staff.update');
        Route::get('/status/{id}','LibraryController@libraryStaffStatus')->name('admin.staff.status.update');
        Route::get('/delete/{id}','LibraryController@libraryStaffDelete')->name('admin.staff.delete');
        Route::post('/staff/multidelete','LibraryController@libraryStaffMultiDelete')->name('admin.staff.multidelete');
    });

});


// fees route start from here

Route::group(['prefix'=>'admin/fees','namespace'=>'Admin'],function(){

    Route::get('/reminder','FeesCotroller@feesReminder')->name('admin.fees.reminder');
    Route::get('/reminder/status/{id}','FeesCotroller@feesReminderStatus')->name('admin.fees.reminder.status.update');
    Route::get('/reminder/edit/{id}','FeesCotroller@feesReminderEdit');
    Route::PATCH('/reminder/update/','FeesCotroller@feesReminderUpdate')->name('admin.fees.remider.update');

    // type area start
    
    Route::get('/type','FeesCotroller@feesType')->name('admin.fees.type');
    Route::get('/type/edit/{id}','FeesCotroller@feesTypeEdit');
    Route::post('/type/multi/delete','FeesCotroller@feesTypeMultidelete')->name('admin.fees.type.multi.delete');
    Route::post('/type/store','FeesCotroller@feesTypeStore')->name('admin.fees.type.store');
    Route::patch('/type/update','FeesCotroller@feesTypeUpdate')->name('admin.fees.type.update');
    Route::get('/type/status/{id}','FeesCotroller@feesTypeStatus')->name('fees.type.status.update');
    Route::get('/type/delete/{id}','FeesCotroller@feesTypeDelete')->name('admin.fees.type.delete');

    // fees discount

    Route::get('/discount','FeesCotroller@feesDiscount')->name('admin.fees.discount');
    Route::get('/discount/edit/{id}','FeesCotroller@feesdiscountEdit');
    Route::post('/discount/multi/delete','FeesCotroller@feesdiscountMultidelete')->name('admin.fees.discount.multi.delete');
    Route::post('/discount/store','FeesCotroller@feesdiscountStore')->name('admin.fees.discount.store');
    Route::patch('/discount/update','FeesCotroller@feesdiscountUpdate')->name('admin.fees.discount.update');
    Route::get('/discount/status/{id}','FeesCotroller@feesdiscountStatus')->name('fees.discount.status.update');
    Route::get('/discount/delete/{id}','FeesCotroller@feesdiscountDelete')->name('admin.fees.discount.delete');

    // fees group type

    Route::get('/group','FeesCotroller@feesgroup')->name('admin.fees.group');
    Route::get('/group/edit/{id}','FeesCotroller@feesgroupEdit');
    Route::post('/group/multi/delete','FeesCotroller@feesgroupMultidelete')->name('admin.fees.group.multi.delete');
    Route::post('/group/store','FeesCotroller@feesgroupStore')->name('admin.fees.group.store');
    Route::patch('/group/update','FeesCotroller@feesgroupUpdate')->name('admin.fees.group.update');
    Route::get('/group/status/{id}','FeesCotroller@feesgroupStatus')->name('fees.group.status.update');
    Route::get('/group/delete/{id}','FeesCotroller@feesgroupDelete')->name('admin.fees.group.delete');

    // fees master 

    Route::get('/master','FeesCotroller@feesmaster')->name('admin.fees.master');
    Route::get('/master/edit/{id}','FeesCotroller@feesmasterEdit');
    Route::post('/master/multi/delete','FeesCotroller@feesmasterMultidelete')->name('admin.fees.master.multi.delete');
    Route::post('/master/store','FeesCotroller@feesmasterStore')->name('admin.fees.master.store');
    Route::patch('/master/update','FeesCotroller@feesmasterUpdate')->name('admin.fees.master.update');
    Route::get('/master/status/{id}','FeesCotroller@feesmasterStatus')->name('fees.master.status.update');
    Route::get('/master/delete/{id}','FeesCotroller@feesmasterDelete')->name('admin.fees.master.delete');

    // collect fees

    Route::get('/collect','FeesCotroller@feesCollect')->name('admin.fees.collect');
    Route::get('/collect/search/{id}','FeesCotroller@feesCollectSearch');
    Route::get('/collection/{id}','FeesCotroller@feesCollection')->name('admin.fees.collection');
    Route::post('/collect/search/','FeesCotroller@feesCollectSectionSearch')->name('admin.fees.students.collection.search');
    Route::post('/get/fees','FeesCotroller@feesCollectSectionGet')->name('admin.fees.collection.get');

});

Route::group(['prefix' => 'admin/reports', 'namespace'=>'Admin', 'middleware' => 'auth:admin'], function() {
    
    Route::group(['prefix' => 'student_report'], function() {

        Route::get('/', 'StudentReportController@index')->name('admin.reports.student.report.index');
        
        Route::get('student/report', 'StudentReportController@studentReport')->name('admin.reports.student.report');
        
        Route::get('student/sibling/report', 'StudentReportController@studentSiblingReport')->name('admin.reports.student.report.sibling');
       
        Route::get('student/guardian/report', 'StudentReportController@studentGuardianReport')->name('admin.reports.student.report.guardian');
        
        Route::get('student/admission/report', 'StudentReportController@studentAdmissionReport')->name('admin.reports.student.report.admission');
        
        Route::get('student/class/subject/report', 'StudentReportController@studentClassSubjectReport')->name('admin.reports.student.report.class.subject');
    });
    
    Route::group(['prefix' => 'finance_report'], function() {

        Route::get('/', 'FinanceReportController@index')->name('admin.reports.finance.report.index');

        Route::get('income/report', 'FinanceReportController@incomeReport')->name('admin.reports.finance.report.income');

        Route::get('income/group/report', 'FinanceReportController@incomeGroupReport')->name('admin.reports.finance.report.income.group');
        
        Route::get('expense/report', 'FinanceReportController@expenseReport')->name('admin.reports.finance.report.expense');
        
        Route::get('expense/group/report', 'FinanceReportController@expenseGroupReport')->name('admin.reports.finance.report.expense.group');
        
        Route::get('account/balance/report', 'FinanceReportController@accountBalanceReport')->name('admin.reports.finance.report.account.report');
        
        Route::get('salary/report', 'FinanceReportController@salaryReport')->name('admin.reports.finance.report.salary.report');

        Route::get('fees/report', 'FinanceReportController@feesReport')->name('admin.reports.finance.report.fees.report');

    }); 
    
    Route::group(['prefix' => 'attendance_report'], function() {

        Route::get('/', 'AttendanceReportController@index')->name('admin.reports.attendance.report.index');
        // Ajax Route

        Route::get('student/attendance/report', 'AttendanceReportController@studentAttendanceReport')->name('admin.reports.attendance.report.student.attendance');
        
        Route::get('employee/attendance/report', 'AttendanceReportController@employeeAttendanceReport')->name('admin.reports.attendance.report.employee.attendance');
        
        Route::get('exam/attendance/report', 'AttendanceReportController@examAttendanceReport')->name('admin.reports.attendance.report.exam.attendance.report');
        
        Route::get('get/exams/by/{sessionId}', 'AttendanceReportController@getExamsBySessionId');
    

        Route::get('get/sections/{classId}', 'AttendanceReportController@getSection');
        
        Route::get('get/subjects/{classId}/{sectionId}', 'AttendanceReportController@getSubjects');
    });

    Route::group(['prefix' => 'human_resource_report'], function(){

        Route::get('/', 'HumanResourceReportController@index')->name('admin.report.human.resource.report.index');

        Route::get('employee/report', 'HumanResourceReportController@employeeReport')->name('admin.report.human.resource.report.employee.report');

        Route::get('leave/apply/report', 'HumanResourceReportController@leaveApplyReport')->name('admin.report.human.resource.report.leave.apply.report');
    });
    
});

Route::group(['prefix'=>'admin/front/cms','namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'event'],function(){
        Route::get('/delete/{id}','FrontCmsController@eventDelete')->name('admin.event.delete');
        Route::get('/edit/{id}','FrontCmsController@eventEdit');
        Route::get('/','FrontCmsController@eventList')->name('admin.event.list');
        Route::get('/status/{id}','FrontCmsController@eventStatus')->name('admin.event.status');
        Route::post('/store','FrontCmsController@eventStore')->name('admin.front.event.store');
        Route::post('/multi/delete','FrontCmsController@eventMultiDelete')->name('admin.front.event.multidelete');
        Route::PATCH('/update','FrontCmsController@eventUpdate')->name('admin.front.event.update');
    });

    Route::group(['prefix'=>'gallery'],function(){
        Route::get('/delete/{id}','FrontCmsController@galleryDelete')->name('admin.gallery.delete');
        Route::get('/edit/{id}','FrontCmsController@galleryEdit');
        Route::get('/','FrontCmsController@galleryList')->name('admin.gallery.list');
        Route::get('/status/{id}','FrontCmsController@galleryStatus')->name('admin.gallery.status');
        Route::post('/store','FrontCmsController@galleryStore')->name('admin.front.gallery.store');
        Route::post('/multi/delete','FrontCmsController@galleryMultiDelete')->name('admin.front.gallery.multidelete');
        Route::PATCH('/update','FrontCmsController@galleryUpdate')->name('admin.front.gallery.update');
    });

     Route::group(['prefix'=>'news'],function(){
        Route::get('/delete/{id}','FrontCmsController@newsDelete')->name('admin.news.delete');
        Route::get('/edit/{id}','FrontCmsController@newsEdit');
        Route::get('/','FrontCmsController@newsList')->name('admin.news.list');
        Route::get('/status/{id}','FrontCmsController@newsStatus')->name('admin.news.status');
        Route::post('/store','FrontCmsController@newsStore')->name('admin.front.news.store');
        Route::post('/multi/delete','FrontCmsController@newsMultiDelete')->name('admin.front.news.multidelete');
        Route::PATCH('/update','FrontCmsController@newsUpdate')->name('admin.front.news.update');
    });

    Route::group(['prefix'=>'page'],function(){
        Route::get('/delete/{id}','FrontCmsController@pageDelete')->name('admin.page.delete');
        Route::get('/edit/{id}','FrontCmsController@pageEdit');
        Route::get('/','FrontCmsController@pageList')->name('admin.page.list');
        Route::get('/status/{id}','FrontCmsController@pageStatus')->name('admin.page.status');
        Route::post('/store','FrontCmsController@pageStore')->name('admin.front.page.store');
        Route::post('/multi/delete','FrontCmsController@pageMultiDelete')->name('admin.front.page.multidelete');
        Route::PATCH('/update','FrontCmsController@pageUpdate')->name('admin.front.page.update');
    });
});

Route::get('/online/user', 'HomeController@onlineUser')->name('online.user');

Route::group(['prefix' => 'admin/settings', 'middleware' => 'auth:admin' , 'namespace' => 'Admin'], function() {
    
    Route::group(['prefix' => 'general'], function() {
        Route::get('/', 'GeneralSettingsController@index')->name('admin.settings.general.index');
        
        Route::post('logo/update/{generalSettingId}', 'GeneralSettingsController@logoUpdate')->name('admin.settings.general.logo.update');
        
        Route::post('school/information/{generalSettingId}', 'GeneralSettingsController@schoolInfoUpdate')->name('admin.settings.general.school.information.update');

        Route::post('set/current/session', 'GeneralSettingsController@setCurrentSession')->name('admin.settings.general.set.current.session');
        
        Route::get('change/current/day/attendance/status/{generalSettingId}', 'GeneralSettingsController@changeCurrentDayAttendanceStatus')->name('admin.settings.general.change.current.day.attendance.status');
        
        Route::get('change/period/attendance/status/{generalSettingId}', 'GeneralSettingsController@changePeriodAttendanceStatus')->name('admin.settings.general.change.period.attendance.status');

        Route::get('change/exam/attendance/status/{generalSettingId}', 'GeneralSettingsController@changeExamAttendanceStatus')->name('admin.settings.general.change.exam.attendance.status');
        
        Route::get('set/color/theme/{colorThemeId}', 'GeneralSettingsController@setColorTheme')->name('admin.settings.general.set.color.theme');
        
    });

    Route::group(['prefix' => 'role_permissions'], function() {
        Route::get('/', 'RolePermissionController@index')->name('admin.gen.settings.role.permit.index');

        Route::get('permission/section/{role_id}/{roleName}', 'RolePermissionController@permitSection')->name('admin.gen.settings.role.permit.section');
        Route::post('permission/{roleId}', 'RolePermissionController@permission')->name('admin.gen.settings.role.permission');
    });
    
});

// Inventory area end

Route::group(['prefix' => 'admin/user', 'middleware' => 'auth:admin' , 'namespace' => 'Admin'], function() {

    Route::get('profile', 'UserProfileController@index')->name('admin.user.profile.index');
    Route::post('change/password', 'UserProfileController@changePassword')->name('admin.user.profile.change.password');

});

Auth::routes();

use App\Admin;
use App\MarkEntires;
use App\RolePermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Route::get('add_admin', function() {
//     Admin::insert([
//         'adminname' => 'Admin',
//         'phone' => '01854284712',
//         'email' => 'admin@gmail.com',
//         'password' => Hash::make('123456789'),
//         'role' => '1',
//     ]);
// });

Route::get('test', function(){
    
    //$mark = MarkEntires::first();
    //return  count(json_decode($mark->mark_distributions));
    // $employeeSalary = App\EmployeeSalary::where('employee_id', 16)->first();
    // $index = 0;
    // foreach (json_decode($employeeSalary->earn_types) as $earn_type) {
    //     echo "<pre>";
    //     echo $earn_type .' = '. json_decode($employeeSalary->earns, true)[$index][$earn_type];
    //     $index++;
    // }

    // $fees = App\FeesCollection::all();
    // return $fees;
    $permissions = App\RolePermission::where('role_id', 1)->firstOrFail();
    return json_decode($permissions->event_module, true);
});




<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //Constant Weight No Fins, Static Apnea
            $table->string('abbreviation'); //CWNF, CNF, etc
            $table->string('measurement'); //seconds, meters, etc
            $table->integer('gender');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('events');
	}

}


/**
AIDA recognized world records[edit]
As of 29 November 2013, the AIDA recognized world records are:[9]
Discipline	Gender	Distance [m]	Time	Name	Date	Place
Constant weight apnea (CWT)	Men	128	-	Alexey Molchanov	2013-09-19	Kalamata, Greece
Constant weight apnea (CWT)	Women	101	-	Natalia Molchanova	2011-09-22	Kalamata, Greece
Constant weight apnea without fins (CNF)	Men	101	-	William Trubridge	2010-12-16	Dean's Blue Hole, Long Island Bahamas
Constant weight apnea without fins (CNF)	Women	69	-	Natalia Molchanova	2013-09-16	Kalamata, Greece
Free immersion apnea (FIM)	Men	121	-	William Trubridge	2011-04-10	Dean's Blue Hole, Long Island Bahamas
Free immersion apnea (FIM)	Women	91	-	Natalia Molchanova	2013-09-21	Kalamata, Greece
Variable weight apnea (VWT)	Men	145	-	William Winram	2013-09-03	Sharm el-Sheikh, Egypt
Variable weight apnea (VWT)	Women	127	-	Natalia Molchanova	2012-06-06	Sharm el-Sheikh, Egypt
No-limits apnea (NLT)	Men	214	-	Herbert Nitsch	2007-06-14	Spetses, Greece
No-limits apnea (NLT)	Women	160	-	Tanya Streeter	2002-08-17	Turks and Caicos
Static apnea (STA)	Men	-	11 min 35 sec	Stéphane Mifsud	2009-06-08	Hyères, Var, France
Static apnea (STA)	Women	-	9 min 02 sec	Natalia Molchanova	2013-06-29	Belgrade, Serbia
Dynamic apnea with fins (DYN)	Men	281	-	Goran Čolak	2013-06-28	Belgrade, Serbia
Dynamic apnea with fins (DYN)	Women	234	-	Natalia Molchanova	2013-06-28	Belgrade, Serbia
Dynamic apnea without fins (DNF)	Men	225	-	Goran Čolak	2013-11-21	Pančevo, Serbia
Dynamic apnea without fins (DNF)	Women	182	-	Natalia Molchanova	2013-06-27	Belgrade, Serbia




Discipline	Gender	Distance [m]	Time	Name/Country	Date	Place	Status
Constant weight with fins (at sea)	Men	97	-	Davide Carrera, Italy	2014-06-21	Salina, Italy	Waiting approval
Dynamic apnea with fins in Olympic pool (no salty water)	Women	215.59	-	Ilaria Bonin, Italy	2012-11-03	Antalya, Turkey	Waiting approval
Static apnea	Men	-	10:05	Branco Petrovic, Serbia	2012-10-01	Antalya, Turkey	Waiting approval
Static apnea	Women	-	07:30	Veronika Dittes, Austria	2012-10-01	Antalya, Turkey	Waiting approval
Jump blue apnea with fins (at sea)	Women	168.69	-	Ilaria Bonin, Italy	2012-10-31	Kemer, Antalya, Turkey	Waiting approval
Jump blue apnea with fins (at sea)	Men	185	-	Michele Giurgola, Italy	2012-10-31	Kemer, Antalya, Turkey	Waiting approval
Jump blue apnea with fins (at sea)	Men	185	-	Xaier Delpit, France	2012-10-31	Kemer, Antalya, Turkey	Waiting approval
Variable weight apnea without fin (at sea)	Men	81	-	Devrim Cenk Ulusoy, Turkey	2012-09-26	Kas, Antalya, Turkey	Waiting approval
Free immersion apnea without fin (at sea)	Men	81	-	Devrim Cenk Ulusoy, Turkey	2012-09-25	Kas, Antalya, Turkey	Waiting approval
Constant weight with fins (at sea)	Men	94	-	Homer Leuci, Italy	2012-09-15	Soverato, Italy	Waiting approval
Variable weight apnea with fin (at sea)	Men	131	-	Homer Leuci. Italy	2012-09-11	Soverato, Italy	Waiting approval
Constant weight with fins (at sea)	Women	70	-	Şahika Ercümen, Turkey	2011-11-10	Dahab, Egypt	Approved
Variable weight apnea without fin (at sea)	Women	60	-	Şahika Ercümen, Turkey	2011-11-10	Dahab, Egypt	Approved
Constant weight with fins (at no salty water)	Men	70	-	Michele Tomasi, Italy	2011-10-02	Trento, Italy	Approved
Constant weight with fins (at sea)	Men	87	-	Devrim Cenk Ulusoy, Turkey	2011-10-02	Kas/Antalya, Turkey	Approved
Free immersion apnea without fin (at sea)	Men	80	-	Devrim Cenk Ulusoy, Turkey	2011-10-01	Kas/Antalya, Turkey	Approved
Constant weight with fins (at sea)	Men	86	-	Homer Leuci, Italy	2011-09-09	Calabria, Italy	Approved
Jump blue apnea with fins (at sea)	Men	175.66	-	Michele Fucarino, Italy	2011-09-04	Tenerife, Spain	Approved
Jump blue apnea with fins (at sea)	Women	158.54	-	Ilaria Bonin, Italy	2011-09-04	Tenerife/Spain	Approved
Static apnea	Men	-	09:32	Branco Petrovic, Serbia	2011-09-02	Tenerife, Spain	Approved
Static apnea	Women	-	06:38	Sophie Jacquin, France	2011-09-02	Tenerife, Spain	Approved
Dynamic apnea with fins in Olympic pool (no salty water)	Men	250	-	Goran Colak, Croatia	2011-09-01	Tenerife, Spain	Approved
Jump blue apnea with fins (at sea)	Men	171.45	-	Alfredo Roen, Spain	2010-10-10	Tenerife, Spain	Approved
Jump blue apnea with fins (at sea)	Women	144	-	Monica Barbero, Italy	2010-10-10	Tenerife, Spain	Approved
Dynamic apnea with fins in Olympic pool (no salty water)	Men	248.52	-	Goran Colak, Croatia	2010-09-13	Zagabria/Croatia	Approved
Dynamic apnea with fins in Olympic pool (no salty water)	Women	205.44	-	Ilaria Bonin, Italy	2010-06-12	Lignano, Italy	Approved
Constant weight with fins (at sea)	Men	84	-	Homer Leuci, Italy	2009-10-04	Andora, Italy	Approved
Constant weight with fins (at sea)	Men	83.1	-	Devrim Cenk Ulusoy, Turkey	2008-10-26	Antalya, Turkey	Approved
Jump blue apnea with fins (at sea)	Men	159.54	-	Devrim Cenk Ulusoy, Turkey	2008-09-05	Antalya, Turkey	Approved
Constant weight with fins (at no salty water)	Women	57	-	Tanya Streeter, USA	1998-12-28	Ocala, Fl, USA	Approved
Constant weight with fins (at sea)	Women	67	-	Tanya Streeter, USA	1998-09-19	S.Maria Nevernese, Italy	Approved
Constant weight with fins (at no salty water)	Men	55	-	Eric Cherrier, France	1997-08-09	Lac De Sainte Croix Du Verdon	Approved

*/


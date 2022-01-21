/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var classes = {
    "1" :	"One",
    "2" :	"Two",
    "3" :	"Three",
    "4" :	"Four",
    "5" :	"Five",
    "6" :	"Six",
    "7" :	"Seven",
    "8" :	"Eight",
    "9" :	"Nine",
    "10" :	"Ten"
};

function print_classes_options()
{
	for(key in classes)
	{
		document.write('<option value="' + key + '">' +classes[key] + '</option>');
	}
}


var religions = {
    "i" :	"Islam",
    "h" :	"Hindu",
    "b" :	"Buddhist",
    "c" :	"Chritian",
    "o" :	"Others"
};

function print_religions_options()
{
	for(key in religions)
	{
		document.write('<option value="' + key + '">' +religions[key] + '</option>');
	}
}


var degrees = {
    "M.Sc." :	"Master   of   Science",
    "M.Com." :	"Master   of   Commerece",
    "M.A." :	"Master   of   Arts",
    "M.B.A." :	"Master   of   Business   Administration",
    "M.S.S." :	"Master   of   Social   Science",
    "M.Ed." :	"Master   of   Education",
    "B.Sc." :	"Bachelor   of   Science",
    "B.Com." :	"Bachelor   of   Commerece",
    "B.A." :	"Bachelor   of   Arts",
    "B.B.A." :	"Bachelor   of   Business   Administration",
    "B.S.S." :	"Bachelor   of   Social   Science",
    "B.Ed." :	"Bachelor   of   Education",
    "H.S.C." :	"Higher   Secondary   School   Certificate",
    "S.S.C." :	"Secondary   School   Certificate"
};

function print_degrees_options()
{
	for(key in degrees)
	{
		document.write('<option value="' + key + '">' +degrees[key] + '</option>');
	}
}


var terms = {
    "1" :	"Half - Yearly",
    "2" :	"Final"
};

function print_terms_options()
{
	for(key in terms)
	{
		document.write('<option value="' + key + '">' +terms[key] + '</option>');
	}
}


var courses = {
    "b" :	"Bangla",
    "b1" :	"Bangla   First   Paper",
    "b2" :	"Bangla   Second   Paper",
    "e" :	"English",
    "e1" :	"English   First   Paper",
    "e2" :	"English   Second   Paper",
    "m" :	"Genaral   Mathmatics",
    "hm" :	"Higher   Mathmatics",
    "m1" :	"Mathmatics   First   Paper",
    "m2" :	"Mathmatics   Second   Paper",
    "gs" :	"General   Science",
    "ss" :	"Social   Science",
    "is" :	"Islamic   Studies",
    "hs" :	"Hindu   Studies",
    "bs" :	"Buddhist   Studies",
    "cs" :	"Christian   Studies",
    "p" :	"Physics",
    "p1" :	"Physics   First   Paper",
    "P2" :	"Physics   Second   Paper",
    "c" :	"Chemistry",
    "c1" :	"Chemistry   First   Paper",
    "c2" :	"Chemistry   Second   Paper",
    "bl" :	"Biology",
    "bt" :	"Botani",
    "zo" :	"Zoology",
    "i" :	"Computer and Inforamation Technology",
    "i1" :	"Computer and Inforamation Technology   First   Paper",
    "i2" :	"Computer and Inforamation Technology   Second   Paper",
    "a" :	"Agricultural   Science",
    "he" :	"Home   Economics",
    "pe." :	"Physical   Education",
    "ad" :	"Arts   and   Drawing"
};

function print_courses_options()
{
	for(key in courses)
	{
		document.write('<option value="' + key + '">' +courses[key] + '</option>');
	}
}
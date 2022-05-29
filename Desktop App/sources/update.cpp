#include "update.h"
#include "ui_update.h"

update::update(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::update)
{
    ui->setupUi(this);

    db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName("127.0.0.1");
    db.setUserName("EduardoGC");
    db.setPassword("+BaalLordOfDestruction1");
    db.setDatabaseName("dentista");
    if(db.open()) {
        QSqlQuery query;
        if (query.exec("SELECT DISTINCT serv_nombre FROM servicios")) {
            while (query.next()) {
                qDebug() << query.value(0);
                ui->servicio->addItem(query.value(0).toString(), currentIndex);
                currentIndex += 1;
            }
        }

    }
    else {
        qDebug() << "No connection";
    }
    currentIndex = 0;
}

update::~update()
{
    delete ui;
}

void update::on_actualizar_clicked()
{
    QString fecha = ui->fecha->text();
    QString hora = ui->hora->text();
    QString id = ui->id->text();
    QString realizada = QString::number(0);
    if(ui->realizada->checkState() == Qt::Checked) {
        realizada = QString::number(1);
    }

    QSqlQuery query;
    qDebug() << "UPDATE citas SET cit_fecha = '" + fecha + "' ,cit_hora = '" + hora +"', cit_realizada = " + realizada + " WHERE cit_id = " + id;
    if(query.exec("UPDATE citas SET cit_fecha = '" + fecha + "' ,cit_hora = '" + hora +"', cit_realizada = " + realizada + " WHERE cit_id = " + id)) {
        QMessageBox::information(this, "Actualizacion", "Cita actualizada", QMessageBox::StandardButton::Ok);
    }
    else {
    qDebug() << query.lastError().text();
    }
}

void update::on_buscar_clicked()
{
        qDebug() << ui->id->text();
            QSqlQuery query;
            if(query.exec("SELECT usuarios.usu_nombre, cit_fecha, cit_hora, cit_realizada, cit_servicio FROM citas JOIN usuarios ON cit_id_usu = usu_id WHERE cit_id = " +ui->id->text())) {
                while (query.next()) {
                qDebug() << query.value(0) << query.value(1) << query.value(2);
                ui->paciente->setText(query.value(0).toString());
                ui->fecha->setText(query.value(1).toString());
                ui->hora->setText(query.value(2).toString());
                if(query.value(3) == 1)
                    ui->realizada->setCheckState(Qt::Checked);
                else
                    ui->realizada->setCheckState(Qt::Unchecked);
                }
                ui->servicio->setCurrentText(query.value(4).toString());
            }
            else {
                qDebug() << query.lastError().text();
                }
}

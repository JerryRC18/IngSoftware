#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    historial = new Historial();
    update = new class::update();

    ui->password->setEchoMode(ui->password->Password);

    db = QSqlDatabase::addDatabase("QMYSQL");

    db.setHostName("bd5s63srxd7fvmbw3cai-mysql.services.clever-cloud.com");
    db.setUserName("urcwxsqgdun2tukm");
    db.setPassword("8QDCaE22vYVXmlNxIjNn");
    db.setDatabaseName("bd5s63srxd7fvmbw3cai");

    if (db.open()) {
        QSqlQuery query;
        if (query.exec("SELECT cit_id, cit_fecha, cit_hora, cit_servicio, usuarios.usu_nombre, cit_realizada FROM citas JOIN usuarios ON cit_id_usu = usuarios.usu_id ORDER BY cit_id")) {
            while (query.next()) {
               qDebug() << query.value(0) << query.value(1) << query.value(2) << query.value(3) << query.value(4) << query.value(5);
               QString id = query.value(0).toString();
               QString fecha = query.value(1).toString();
               QString hora = query.value(2).toString();
               QString serv =query.value(3).toString();
               QString usu_id = query.value(4).toString();

               ui->tableWidget->setRowCount(ui->tableWidget->rowCount() + 1);
               QTableWidgetItem* idItem = new QTableWidgetItem(id);
               QTableWidgetItem* fechaItem = new QTableWidgetItem(fecha);
               QTableWidgetItem* horaItem = new QTableWidgetItem(hora);
               QTableWidgetItem* servItem = new QTableWidgetItem(serv);
               QTableWidgetItem* usuItem = new QTableWidgetItem(usu_id);
               QPushButton* btn = new QPushButton();
               btn->setText("Delete");
               connect(btn, &QPushButton::clicked, this, &MainWindow::on_delete_clicked);
               QPushButton* btn2 = new QPushButton();
               btn2->setText("Edit");

               QTableWidgetItem* Realizada = new QTableWidgetItem();
               if(query.value(5) == "\u0001")
                    Realizada->setCheckState(Qt::Checked);
               else
                    Realizada->setCheckState(Qt::Unchecked);


               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 0, idItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 1, fechaItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 2, horaItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 3, servItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 4, usuItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 5, Realizada);
               ui->tableWidget->setCellWidget(ui->tableWidget->rowCount() -1, 6, (QWidget*)btn);
               ui->tableWidget->setCellWidget(ui->tableWidget->rowCount() -1, 7, (QWidget*)btn2);
            }
            hasInit = true;
        }
        else {
            qDebug() << query.lastError().text();
        }

    }
        else {
            qDebug() << "Failed to connect to database.";
    }
}

MainWindow::~MainWindow()
{
    db.close();
    delete ui;
}

void MainWindow::changeWindow()
{
    if(historial->isVisible())
    {
        historial->hide();
        this->show();
    }
    else
    {
        this->hide();
        historial->show();
    }

    if(update->isVisible())
    {
        update->hide();
        this->show();
    }
    else
    {
        this->hide();
        update->show();
    }

}


void MainWindow::on_pushButton_clicked()
{
    historial->show();
}

void MainWindow::on_pushButton_2_clicked()
{
    update->show();
}

void MainWindow::on_delete_clicked(){

    QString Id = ui->tableWidget->item(ui->tableWidget->currentRow(), 0)->text();
    QMessageBox::StandardButton reply = QMessageBox::information(this, "Borrar registro", "Esta seguro de que desea borrar el registro?",QMessageBox::StandardButton::Yes | QMessageBox::StandardButton::No);

    if(reply == QMessageBox::Yes) {
        qDebug() << ui->tableWidget->item(ui->tableWidget->currentRow(), 0)->text();
        QSqlQuery query;
        if (query.exec("DELETE FROM citas WHERE cit_id = " +Id)) {
            qDebug() << "Deleted";
        }
        else {
        qDebug() << query.lastError().text();
        }
    }
}

void MainWindow::on_pushButton_3_clicked()
{
    if (db.open()) {
        QSqlQuery query;
        if (query.exec("SELECT cit_id, cit_fecha, cit_hora, cit_servicio, usuarios.usu_nombre, cit_realizada FROM citas JOIN usuarios ON cit_id_usu = usuarios.usu_id ORDER BY cit_id")) {
           ui->tableWidget->setRowCount(0);
            while (query.next()) {
               qDebug() << query.value(0) << query.value(1) << query.value(2) << query.value(3) << query.value(4) << query.value(5);
               QString id = query.value(0).toString();
               QString fecha = query.value(1).toString();
               QString hora = query.value(2).toString();
               QString serv =query.value(3).toString();
               QString usu_id = query.value(4).toString();

               ui->tableWidget->setRowCount(ui->tableWidget->rowCount() + 1);
               QTableWidgetItem* idItem = new QTableWidgetItem(id);
               QTableWidgetItem* fechaItem = new QTableWidgetItem(fecha);
               QTableWidgetItem* horaItem = new QTableWidgetItem(hora);
               QTableWidgetItem* servItem = new QTableWidgetItem(serv);
               QTableWidgetItem* usuItem = new QTableWidgetItem(usu_id);
               QPushButton* btn = new QPushButton();
               btn->setText("Delete");
               connect(btn, &QPushButton::clicked, this, &MainWindow::on_delete_clicked);
               QPushButton* btn2 = new QPushButton();
               btn2->setText("Edit");

               QTableWidgetItem* Realizada = new QTableWidgetItem();
               if(query.value(5) == "\u0001")
                    Realizada->setCheckState(Qt::Checked);
               else
                    Realizada->setCheckState(Qt::Unchecked);


               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 0, idItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 1, fechaItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 2, horaItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 3, servItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 4, usuItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 5, Realizada);
               ui->tableWidget->setCellWidget(ui->tableWidget->rowCount() -1, 6, (QWidget*)btn);
               ui->tableWidget->setCellWidget(ui->tableWidget->rowCount() -1, 7, (QWidget*)btn2);
            }
            hasInit = true;
        }
        else {
            qDebug() << query.lastError().text();
        }

    }
        else {
            qDebug() << "Failed to connect to database.";
    }
}


void MainWindow::on_login_clicked()
{
    QString username = ui->user_name->text();
    QString password = ui->password->text();
    if(username == "dentista" && password == "contrasena" )
        ui->stackedWidget->setCurrentIndex(1);
    else {
        ui->user_name->clear();
        ui->password->clear();
    }
    QSqlQuery query;
    if(query.exec("SELECT ad_id FROM admin WHERE ad_correo = '" +username+"' AND ad_contrasena = '" +password+ "'")) {
        if(query.size() > 0)
            ui->stackedWidget->setCurrentIndex(1);
        else
            QMessageBox::warning(this, "Login failed", "Invalid username or password.");
    }
    else {
        ui->user_name->clear();
        ui->password->clear();
    }
}
